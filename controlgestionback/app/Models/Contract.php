<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContractDocument;
use App\Models\HiringMemo;
use App\Models\Project;
use App\Models\Payment;


class Contract extends Model
{
    use HasFactory;

    protected $with = ['ContractDocument','HiringMemo', 'project'];

    protected $fillable = [
        'id',
        'name',
        'startDate',
        'endDate',
        'anticipatedDate',
        'startDelayedDate',
        'contractNumber',
        'monthsDuration',
        'daysDuration',
        'project_id',
        'employee_id',
        'memo_id',
        'isActive'
    ];

    public function ContractDocument() {
        return $this->hasOne('App\Models\ContractDocument');
    }

    public function HiringMemo()
    {
        return $this->hasOne(HiringMemo::class,'id','memo_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'contract_id', 'id')->orderBy('service_month','asc');
    }

    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }




    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function scopeSearch($query, $search) 
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                  
                }
            });
        });
    }
}
