<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'cat_employment_type_id',
        'cat_contract_type_id',
        'cat_unit_id',
        'cat_employment_location_id',
        'cat_off_work_reason_id',
        'cat_employment_client_id',
        'position_id',
        'has_kit',
        'observation',
        'date',
        'massive_loaded',
        'is_active',
    ];

    protected $guarded = [];

    public function employment_type() {
        return $this->hasOne('App\Models\Catalogs\CatEmploymentType', 'id', 'cat_employment_type_id');
    }

    public function unit() {
        return $this->hasOne('App\Models\Catalogs\CatUnit', 'id', 'cat_unit_id');
    }

    public function contract_type() {
        return $this->hasOne('App\Models\Catalogs\CatContractType', 'id', 'cat_contract_type_id');
    }

    public function location() {
        return $this->hasOne('App\Models\Catalogs\CatEmploymentLocation', 'id', 'cat_employment_location_id');
    }

    public function client() {
        return $this->hasOne('App\Models\Catalogs\CatEmploymentClient', 'id', 'cat_employment_client_id');
    }

    public function offWorkReason() {
        return $this->hasOne('App\Models\Catalogs\CatOffWorkReason', 'id', 'cat_off_work_reason_id');
    }

    public function position() {
        return $this->hasOne('App\Models\Position', 'id', 'position_id');
    }
    public function contracType() {
        return $this->hasOne('App\Models\Catalogs\CatContractType', 'id', 'cat_contract_type_id');
    }
    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function scopeSearch($query, $search)
    {
        // TODO: Add search on relations
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('date', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
