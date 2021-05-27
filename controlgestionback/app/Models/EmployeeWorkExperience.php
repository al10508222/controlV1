<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeWorkExperience extends Model
{
    use HasFactory;

    protected $fillable = ['company', 'position', 'description', 'start_date', 'end_date', 'achievements']; 

    protected $casts = [
        'achievements' => 'array',
    ];
}
