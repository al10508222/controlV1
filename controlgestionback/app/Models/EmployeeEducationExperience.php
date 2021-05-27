<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducationExperience extends Model
{
    use HasFactory;
    protected $fillable = ['school', 'title', 'description', 'start_date', 'end_date'];
    
    public function status(){
        return $this->hasOne('App\Models\Catalogs\CatEducationStatus', 'id', 'cat_education_status_id');
    }
}
