<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedPayrollConcept extends Model
{
    use HasFactory;

    public function typeConcept() {
        return $this->hasOne('App\Models\Catalogs\CatConceptType', 'id', 'cat_concept_type_id');
    }

}
