<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatTypeData extends Model
{
    use HasFactory;
    
    protected $table="cat_type_data";

    protected $fillable = [
        'name',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
