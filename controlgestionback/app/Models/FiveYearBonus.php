<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiveYearBonus extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'year', 'description'];

    public function fiveYearBonusConfig () {
      return $this->hasMany('App\Models\FiveYearBonusConfig', 'five_year_bonuses_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {
            return $query->where(function($q) use ($search){
                if(isset($search) && !empty($search)){
                    $q->where('name', 'like', '%'.$search.'%');
                    $q->orWhere('year', 'like', '%'.$search.'%');
                }        
            });
        });
    }
}
