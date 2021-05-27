<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatTransactionTypes extends Model
{
    use HasFactory;

    const CREATED = 1;
    const EDIT = 2;
    const DELETE = 3;

    protected $fillable = ['name', 'isActive'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
