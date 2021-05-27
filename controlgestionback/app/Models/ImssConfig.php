<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImssConfig extends Model
{
    use HasFactory;
    protected $table = "imss_configs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imss_deduction_id',
        'cat_concept_imss_deduction_id',
        'cat_rules_imss_deduction_id',
        'employer_fee',
        'worker_fee'
    ];
}
