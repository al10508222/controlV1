<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CatTimeZone;

class Schedule extends Model
{
    use HasFactory;

    protected $with = ['catTimeZone'];

    protected $fillable = ['name', 'description', 'cat_time_zone_id', 'has_rest_time'];

    public function scheduleDay(){
        return $this->hasMany('App\Models\ScheduleDay','schedule_id');
    }

    public function catTimeZone() {
        return $this->hasOne(CatTimeZone::class,'id','cat_time_zone_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('name', 'like', '%' . $search . '%');
                    $q->orWhere('description', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
