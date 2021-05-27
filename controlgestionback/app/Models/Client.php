<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'acronym',
        'name',
        'cat_employment_location_id'
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    

    public function scopeSearch($query, $search) 
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('acronym', 'like', '%' . $search . '%');
                    $q->orWhere('name', 'like', '%' . $search . '%');
                }
            });
        });
    }


}
