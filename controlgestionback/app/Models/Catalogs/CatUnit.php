<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cat_dependency_id',
        'code',
        'number'
    ];

    public function dependency(){
        return $this->hasOne('App\Models\Catalogs\CatDependency', 'id', 'cat_dependency_id');
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
