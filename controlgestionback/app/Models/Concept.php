<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;

    private const NON_TAXABLE = 1;
    private const TAXABLE = 2;
    private const PARTIALLY_TAXABLE = 3;

    protected $fillable = [
        'code',
        'name',
        'cat_concept_type_id',
        'cat_concept_calculation_type_id',
        'cat_periodicity_type_id',
        'cat_core_expression_id',
        'cat_yearly_variable_type_id',
        'extraordinary_date',
        'cat_sat_concept_id',
        'cat_specific_budget_item_id',
        'observation',
        'has_validity',
        'validity_start_date',
        'validity_end_date',
        'is_global_automatic',
        'taxable_type',
        'is_pantry_voucher',
        'condition_total',
        'is_settlement_automatic',
        'should_print',
        'fixed_amount',
        'is_active',
    ];

    public function concept_type() {
        return $this->hasOne('App\Models\Catalogs\CatConceptType', 'id', 'cat_concept_type_id');
    }

    public function tabulators() {
        return $this->belongsToMany('App\Models\Catalogs\CatTabulator', 'concept_has_tabulator', 'concept_id', 'cat_tabulator_id');
    }

    public function contracts() {
        return $this->belongsToMany('App\Models\Catalogs\CatContractType', 'concept_has_contract_type', 'concept_id', 'cat_contract_type_id');
    }

    public function dependencies() {
        return $this->belongsToMany('App\Models\Catalogs\CatDependency', 'concept_has_dependency', 'concept_id', 'cat_dependency_id');
    }

    public function locations () {
        return $this->belongsToMany('App\Models\Catalogs\CatEmploymentLocation', 'concept_has_employment_location', 'concept_id', 'cat_employment_location_id');
    }

    public function conditionExpression () {
        return $this->hasOne('App\Models\Catalogs\Core\CatCoreExpression', 'id', 'cat_core_expression_id');
    }

    public function conditionYearlyVariableType () {
        return $this->hasOne('App\Models\Catalogs\CatYearlyVariableType', 'id', 'cat_yearly_variable_type');
    }

    public function employees () {
        return $this->belongsToMany('App\Models\Employee', 'concept_has_employee', 'concept_id', 'employee_id')->withPivot('should_exclude');
    }

    public function core_expressions () {
        return $this->belongsToMany('App\Models\Catalogs\Core\CatCoreExpression', 'concept_has_core_expression', 'concept_id', 'cat_core_expression_id')->orderBy('expression_index');
    }

    public function scopeSearch($query, $filters)
    {
        $search = $filters->search;
        $contract_type_id = $filters->contract_type;
        return $query->when(!empty ($search), function ($query) use ($search) {
            return $query->where(function ($q) use ($search) {
                if (isset($search) && !empty($search)) {
                    $q->where('code', 'ilike', '%' . $search . '%');
                    $q->orWhere('name', 'ilike', '%' . $search . '%');
                }
            });
        })
            ->when($contract_type_id, function ($query) use ($contract_type_id) {
                $query->whereHas('contracts', function ($q) use ($contract_type_id) {
                    $q->where('cat_contract_type_id', $contract_type_id);
                });
            });
    }

    public function setFixedAmountAttribute($value)
    {
        $this->attributes['fixed_amount'] = $value * 100;
    }
}
