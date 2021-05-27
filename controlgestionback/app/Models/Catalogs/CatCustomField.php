<?php

namespace App\Models\Catalogs;

use App\Models\EmployeeHasCustomField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogs\CatModule;
use App\Models\Catalogs\CatTypeData;
use App\Models\CustomPivotOption;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatCustomField extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = ['Module','CatTypeData','Pivot'];


    protected $fillable = [
        'name',
        'description',
        'cat_modules_id',
        'cat_type_data_id',
        'length',
        'is_required',
        'calculator_field',
        'default_value',
        'cat_core_expression_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function Pivot()
    {
        return $this->hasMany(CustomPivotOption::class);

    }

    public function Module()
    {
        return $this->hasOne(CatModule::class,'id','cat_modules_id');
    }

    public function CatTypeData()
    {
        return $this->hasOne(CatTypeData::class,'id','cat_type_data_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('name', 'like', '%' . $search . '%');
                }
            });
        });
    }

    public function scopeCustomValues($query, $employee)
    {
        return $this->with(['values' => function($q) use ($employee) {
            $q->where('employee_id', '=', $employee);
        }]);
    }

    public function values() {
        return $this->hasMany(EmployeeHasCustomField::class);
    }
}
