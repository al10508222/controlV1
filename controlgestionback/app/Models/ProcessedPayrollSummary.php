<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedPayrollSummary extends Model
{
    use HasFactory;
    protected $table = "processed_payroll_summaries";

    protected $fillable = [
        'configuration',
    ];

    protected $casts = [
        'configuration' => 'array',
    ];

}
