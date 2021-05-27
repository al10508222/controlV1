<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPeriodicityType extends Model
{
    const DAILY = 1;
    const WEEKLY = 2;
    const FOURTEEN = 3;
    const BIWEEKLY = 4;
    const MONTHLY = 5;
    const BIMONTHLY = 6;
    const EXTRAORDINARY = 10;
    use HasFactory;
}
