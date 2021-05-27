<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatEmploymentType extends Model
{
    use HasFactory;

    const NEW_ENTRY = 1;
    const OFFWORK = 5;
}
