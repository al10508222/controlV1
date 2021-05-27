<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatBank extends Model
{
    use HasFactory;

    const BBVA = "012";

    protected $fillable = ['name','identifier'];
}
