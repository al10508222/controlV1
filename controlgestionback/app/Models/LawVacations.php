<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawVacations extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'year', 'description'];

    public function lawVacationsConfig () {
        return $this->hasMany('App\Models\LawVacationsConfig', 'law_vacations_id');
    }

    public function scopeSearch($query, $search)
    {   
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                    $q->orWhere('year', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
