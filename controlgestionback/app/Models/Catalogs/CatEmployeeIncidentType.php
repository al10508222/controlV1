<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatEmployeeIncidentType extends Model
{
    use HasFactory;
    
    public const ABSENTEEISM = 1;
    public const INABILITY_TYPE_ID = 2;
    public const PAID_LEAVE = 3;
    public const UNPAID_LEAVE = 4;
}