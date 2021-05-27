<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentComplement extends Model
{
    use HasFactory;

    protected $with = ['pdf','xml'];


    public function pdf(){
        return $this->hasOne('App\Models\File', 'id', 'pdf_file_id');
    }

    public function xml(){
        return $this->hasOne('App\Models\File', 'id', 'xml_file_id');
    }
}
