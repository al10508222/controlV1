<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeIncident extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['employee_id', 'cat_employee_incident_type_id', 'cat_employee_inability_type_id', 'observation', 'certificate'];

    
    public function employee() {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

    public function incident_type () {
        return $this->hasOne('App\Models\Catalogs\CatEmployeeIncidentType', 'id', 'cat_employee_incident_type_id');
    }

    public function dates () {
        return $this->hasMany('App\Models\EmployeeIncidentDate', 'employee_incident_id', 'id');
    }
}
