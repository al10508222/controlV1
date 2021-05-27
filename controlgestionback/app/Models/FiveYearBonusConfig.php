<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiveYearBonusConfig extends Model
{
    use HasFactory;
    protected $fillable = ['initial_period', 'final_period', 'monthly_amount'];
}
