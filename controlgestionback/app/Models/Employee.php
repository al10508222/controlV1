<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\TransactionCreated;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    const EMPLOYEE = 1;
    const PROVIDER = 2;
    const ACTIVATED = 1;
    const FIRSTTIME = 1;

    protected $fillable = ['name', 'code', 'email', 'lastname', 'second_lastname', 'rfc', 'curp', 'nss', 'cat_gender_id', 'cat_country_id', 'cat_state_id', 'cat_marital_status_id', 'cat_educational_level_id', 'telephone', 'cellphone', 'emergency_telephone', 'skills', 'birthdate','semblance'];

    protected $appends = ['full_name'];

    protected $casts = [
        'skills' => 'array',
    ];

    protected $with = ['account', 'user', 'documents'];

    protected $dispatchesEvents = [

        'store' => TransactionCreated::class,

    ];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname . ' ' . $this->second_lastname;
    }

    public function getFullName(){
        $lastName = is_null($this->second_lastname) ? '' :  $this->second_lastname;
        return $this->name . ' ' . $this->lastname . ' ' . $lastName;
     }

    public function customField()
    {
        return $this->hasMany('App\Models\EmployeeHasCustomField');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\EmployeeAddress');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\EmployeeDocument');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\EmployeeWorkExperience');
    }

    public function education() {
        return $this->hasMany('App\Models\EmployeeEducationExperience');
    }

    public function certifications() {
        return $this->hasMany('App\Models\EmployeeCertification');
    }

    public function skills() {
        return $this->hasMany('App\Models\EmployeeSkill');
    }

    public function accounts() {
        return $this->hasMany('App\Models\EmployeeBankAccount');
    }

    public function account() {
        return $this->hasOne('App\Models\EmployeeBankAccount')->where('isActive', true);
    }

    public function employments() {
        return $this->hasMany('App\Models\Employment');
    }

    public function current_employment() {
        return $this->hasMany(Employment::class)->where('is_active','=', true)->limit(1);
    }

    public function gender(){
        return $this->hasOne('App\Models\Catalogs\CatGender', 'id', 'cat_gender_id');
    }

    public function contact(){
        return $this->hasOne('App\Models\EmployeeContact', 'employee_id', 'id');
    }

    public function maritalStatus() {
        return $this->hasOne('App\Models\Catalogs\CatMaritalStatus', 'id', 'cat_marital_status_id');
    }

    public function educationLevel() {
        return $this->hasOne('App\Models\Catalogs\CatEducationalLevel', 'id', 'cat_educational_level_id');
    }

    public function country() {
        return $this->hasOne('App\Models\Catalogs\CatCountry', 'id', 'cat_country_id');
    }

    public function state() {
        return $this->hasOne('App\Models\Catalogs\CatState', 'id', 'cat_state_id');
    }

    public function status() {
        return $this->hasOne('App\Models\Catalogs\CatEducationStatus', 'id', 'cat_education_status_id');
    }

    /* CURRENT Employment */
    public function employment() {
        return $this->hasOne('App\Models\Employment')->where('is_active', true);
    }

    public function user() {
         return $this->hasOne('App\Models\UserExternal');
    }

    public function first_employment() {
        return $this->hasMany(Employment::class)->orderBy('date')->limit(1);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('curp', 'like', '%' . $search . '%');
                    $q->orWhere('name', 'like', '%' . $search . '%');
                    $q->orWhere('rfc', 'like', '%' . $search . '%');
                    $q->orWhere('lastname', 'like', '%' . $search . '%');
                    $q->orWhere('second_lastname', 'like', '%' . $search . '%');
                    $q->orWhere('email', 'like', '%' . $search . '%');

                    // Where Certification name
                    $q->orWhereHas('certifications', function($q) use ($search) {
                        $q->where('name', 'like', '%'.$search.'%')
                            ->orWhere('description', 'like', '%'.$search.'%');
                    });
                }

                
            });

            
        });
    }
}