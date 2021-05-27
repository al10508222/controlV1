<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsrWithholdings extends Model
{
    use HasFactory;
    protected $table = "isr_withholdings";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lower_limit',
        'upper_limit',
        'fixed_fee',
        'percent_over_lower_limit',
        
      ];
}
