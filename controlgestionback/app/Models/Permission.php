<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table="cat_permissions";

    /**
     * Get the profiles that the user has allowet.
     */
    public function profiles(){ 
        return $this->belongsToMany('App\Models\UserProfile','role_has_permissions','permission_id','profile_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('key', 'like', '%' . $search . '%');
                    $q->orWhere('name', 'like', '%' . $search . '%');
                
                }
            });
        });
    }
}
