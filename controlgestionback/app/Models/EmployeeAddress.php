<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;
    protected $fillable = ['town', 'neighborhood', 'city', 'zipcode', 'street', 'ext_num', 'int_num'];

    public function state() {
        return $this->hasOne('App\Models\Catalogs\CatState', 'id', 'cat_state_id');
    }
}
