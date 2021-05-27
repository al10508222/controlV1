<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedPayrollIsssteFee extends Model
{
    use HasFactory;

    public function cat_concept() {
        return $this->hasOne('App\Models\Catalogs\CatConceptIsssteDeduction', 'id', 'cat_concept_issste_deduction_id');
    }
}
