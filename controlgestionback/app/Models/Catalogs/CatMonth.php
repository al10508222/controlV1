<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatMonth extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'isActive'];
}
