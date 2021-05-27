<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeHasCustomField extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
  //agregue yo
    public function catCustomField(){
        return $this->hasOne('App\Models\Catalogs\CatCustomField','id','cat_custom_field_id');
     //   return $this->hasOne('App\Models\Catalogs\CatEmploymentLocation', 'id', 'cat_employment_location_id');

    }
}
