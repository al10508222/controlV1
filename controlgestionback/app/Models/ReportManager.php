<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportManager extends Model
{
    use HasFactory;
    protected $table = 'report_manager';

    protected $fillable = ['name','cat_module_id', 'model', 'payload', 'cat_type_employee_id'];

    // public function profile(){
    //     return $this->hasOne('App\Models\UserProfile','id','profile_id');
    // }

    // public function modules()
    // {
    // return $this->hasMany('App\Models\Catalogs\CatModules');
    // }
}
