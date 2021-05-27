<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedPayroll extends Model
{
    use HasFactory;

    public function concepts() {
        return $this->hasMany('App\Models\ProcessedPayrollConcept');
    }

    public function taxableAmount() {
        return $this->hasOne('App\Models\ProcessedPayrollConcept', 'cat_concept_type_id', 'id');//->where('cat_concept_type_id', 1);

    }

    public function issste_fees() {
        return $this->hasMany('App\Models\ProcessedPayrollIsssteFee');
    }

    public function conceptNames() {
        return $this->hasMany('App\Models\ProcessedPayrollConcept')->groupBy('name')->pluck('name');
    }

    public function scopeSearch($query, $search) {
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
