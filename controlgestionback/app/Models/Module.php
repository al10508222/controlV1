<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table="cat_modules";

    /**
     * Get the permissions of the module.
     */
    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }

}
