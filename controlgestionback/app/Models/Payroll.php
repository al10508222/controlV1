<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Payroll extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 
        'cat_contract_type_id', 
        'cat_periodicity_type_id', 
        'period_days',
        'payment_date', 
        'payment_period_start', 
        'payment_period_end'];

    public function status() {
        return $this->hasOne('App\Models\Catalogs\CatPayrollStatus', 'id', 'cat_payroll_status_id');
    }

    public function cat_contract() {
        return $this->hasOne('App\Models\Catalogs\CatContractType', 'id', 'cat_contract_type_id');
    }
    public function catPeriodicity() {
        return $this->hasOne('App\Models\Catalogs\CatPeriodicityType', 'id', 'cat_periodicity_type_id');
    }

    public function processed() {
        return $this->hasOne('App\Models\ProcessedPayrollSummary')->orderBy('created_at','desc');
    }

    public function processed_payrolls() {
        return $this->hasOne('App\Models\ProcessedPayroll')->orderBy('created_at','desc');
    }

    public function concepts () {
        return $this->belongsToMany('App\Models\Concept', 'payroll_has_concept', 'payroll_id', 'concept_id');
    }

    public function employees () {
        /* WARNING: Employees only if assigned via assignations for extraordinary payroll */
        return $this->belongsToMany('App\Models\Employee', 'payroll_has_employee', 'payroll_id', 'employee_id');
    }

    public function scopeSearch($query, $search) {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('code', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
