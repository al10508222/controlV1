<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPivotOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cat_custom_field_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
