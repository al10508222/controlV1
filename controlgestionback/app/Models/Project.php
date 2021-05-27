<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Catalogs\CatUnit;
use App\Models\Contract;

class Project extends Model
{
    use HasFactory;

    protected $with = ['Client','Unit'];

    protected $appends = ['FullName'];

    protected $fillable = [
        'project_key',
        'speciality',
        'specific',
        'client_id',
        'unit_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getFullNameAttribute()
    {
        return $this->Unit->number. '-' . $this->project_key . '-' . $this->speciality . '-' . $this->specific;
    }

    public function Client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function Unit()
    {
        return $this->hasOne(CatUnit::class,'id','unit_id');
    }

    public function Contract()
    {
        return $this->hasMany(Contract::class,'id','project_id');
    }
  

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('speciality', 'like', '%' . $search . '%');
                    $q->orWhere('specific', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
