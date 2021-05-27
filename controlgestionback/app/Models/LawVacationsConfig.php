<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawVacationsConfig extends Model
{
    use HasFactory;
    protected $fillable = ['days', 'from', 'to'];
}
