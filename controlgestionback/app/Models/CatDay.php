<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatDay extends Model
{
    use HasFactory;

    // protected $fillable = ['name'];

    // public function scheduleDay(){
    //     return $this->hasMany('App\Models\ScheduleDay','cat_day_id');
    // }

    // public function scopeSearch($query, $search)
    // {
    //     return $query->when(! empty ($search), function ($query) use ($search) {

    //         return $query->where(function($q) use ($search)
    //         {
    //             if (isset($search) && !empty($search)) {
    //                 $q->orWhere('name', 'like', '%' . $search . '%');
    //             }
    //         });
    //     });
    // }
}
