<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','cat_unit_id','cat_tabulator_id'];

    public function unit(){
        return $this->belongsTo('App\Models\Catalogs\CatUnit','cat_unit_id','id');
    }

    public function tabulator(){
        return $this->belongsTo('App\Models\Catalogs\CatTabulator','cat_tabulator_id','id');
    }

    public function employments() {
        return $this->hasMany('App\Models\Employment');
    }

    public function employment() {
        return $this->hasOne('App\Models\Employment', 'position_id', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                    $q->orWhereHas('unit', function (Builder $query ) use($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                    $q->orWhereHas('tabulator', function (Builder $query) use($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });

                }
            });
        });
    }
}
