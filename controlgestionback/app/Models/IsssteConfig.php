<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsssteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'issste_deduction_id',
        'cat_concept_issste_deduction_id',
        'employer_fee',
        'worker_fee',
    ];
}
