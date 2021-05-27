<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatEmploymentLocation extends Model
{
    use HasFactory;

    protected $with = ['GeoCatCountry','GeoCatState'];

    protected $fillable = [
        'name',
        'address',
        'country',
        'state',
        'zipcode',
        'ext_num',
        'int_num',
        'latitude',
        'longitude',
    ];

    public function GeoCatCountry()
    {
        return $this->hasOne(CatCountry::class,'id','country');
    }

    public function GeoCatState()
    {
        return $this->hasOne(CatState::class,'id','state');
    }


    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('name', 'like', '%' . $search . '%');
                }
            });
        });
    }

}

