<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogs\CatYearlyVariableType;

class CatYearlyVariable extends Model
{
    use HasFactory;

    protected $table="cat_yearly_variables";

    protected $with = ['CatYearlyVariableType'];

    protected $fillable = [
        'value',
        'year',
        'cat_yearly_variable_type_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function CatYearlyVariableType()
    {
        return $this->hasOne(CatYearlyVariableType::class,'id','cat_yearly_variable_type_id');
    }


    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('year', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
