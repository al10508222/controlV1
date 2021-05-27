<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatAuditMovementType extends Model
{
    use HasFactory;
    
    const CREATE = 1;
    const UPDATE = 2;
    const DELETE = 3;
    const MASSIVE_LOAD = 4;

    protected $guarded = [];
}