<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    use HasFactory;

    protected $appends  = ['hash'];

    protected $with = ['document'];

    
    public function getHashAttribute()
    {
        return encrypt( $this->id );
    }
    
    public function file(){
        return $this->hasOne('App\Models\File','id','file_id');
    }
    public function document(){
        return $this->hasOne('App\Models\Catalogs\CatDocument','id','cat_document_id');
    }

}
