<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollEmploymentSubsidies extends Model
{
    use HasFactory;
    protected $table = "payroll_employment_subsidies_configs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'year',
        'cat_periodicity_type_id'
    ];

    
     /**
     * Get the EmploymentSubsidiesWithholdings .
     */
    public function employmentSubsidiesWithholdings()
    {
        return $this->hasMany('App\Models\EmploymentSubsidiesWithholdings', 'payroll_employment_subsidies_configs_id');
    }


    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                    $q->orWhere('year', 'like', '%' . $search . '%');
                }
            });
        });
    }

}
