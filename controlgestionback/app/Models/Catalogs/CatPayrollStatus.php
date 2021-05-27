<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPayrollStatus extends Model
{
    use HasFactory;

    const CREATED = 1;
    const IN_PROGRESS = 2;
    const PROCESSED = 3;
    const FAILED = 4;
    const CANCELED = 5;
    const VALIDATED = 6;
}
