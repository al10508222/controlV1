<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatTabulator extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function contract(){
        return $this->hasOne('App\Models\Catalogs\CatContractType','id','cat_contract_type_id');
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
}
