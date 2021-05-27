<?php

namespace App\Models\Catalogs\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatCoreExpressionType extends Model
{
    use HasFactory;

    public function expressions()
    {
        return $this->hasMany('App\Models\Catalogs\Core\CatCoreExpression','cat_core_expression_type_id');
    }
}
