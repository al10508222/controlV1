<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatYearlyVariableType extends Model
{
    use HasFactory;

    protected $table = "cat_yearly_variable_types";

    protected $fillable = ['name'];

    
}
