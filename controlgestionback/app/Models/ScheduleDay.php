<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CatDay;
use App\Models\Schedule;

class ScheduleDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'cat_day_id',
        'hour_in',
        'break_in',
        'break_out',
        'hour_out',
        'is_rest_day',
    ];

    public function schedule() {
        return $this->hasOne(Schedule::class,'id','schedule_id');
    }

    public function catDay() {
        return $this->hasOne(CatDay::class,'id','cat_day_id');
    }
}
