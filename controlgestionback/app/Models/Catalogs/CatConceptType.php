<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatConceptType extends Model
{
    use HasFactory;
    const PERCEPTION = 1;
    const DEDUCTION = 2;
    const PROVISION = 3;
}
