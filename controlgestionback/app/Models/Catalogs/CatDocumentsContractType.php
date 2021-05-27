<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatDocumentsContractType extends Model
{
    use HasFactory;

    public function document(){
        return $this->hasOne('App\Models\CatDocument','id','cat_document_id');
    }

    public function contract(){
        return $this->hasOne('App\Models\Catalogs\CatContractType','id','cat_contract_type_id')->select(['id','name']);
    }
}
