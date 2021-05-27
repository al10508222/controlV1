<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatConceptCalculationType extends Model
{
    use HasFactory;

    const FIXED = 1;
    const VARIABLE = 2;
}
