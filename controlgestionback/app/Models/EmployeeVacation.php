<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeVacation extends Model
{
    use HasFactory;

    protected $casts = [
        'days' => 'array',
    ];
}
