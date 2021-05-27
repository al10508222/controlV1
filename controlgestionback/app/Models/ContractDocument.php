<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractDocument extends Model
{
    use HasFactory;

    protected $with = ['file'];

    protected $fillable = ['contract_id','file_id'];

    public function file(){
        return $this->hasOne('App\Models\File','id','file_id');
    }
}
