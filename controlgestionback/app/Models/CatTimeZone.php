<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatTimeZone extends Model
{
    use HasFactory;

    // protected $fillable = ['name'];

    // public function schedule(){
    //     return $this->hasMany('App\Models\Schedule','cat_time_zone_id');
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
