<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentInvoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['fiscalKey', 'payment_id', 'xml_file_id', 'pdf_file_id'];

    protected $with = ['pdf', 'xml'];


    public function pdf(){
        return $this->hasOne('App\Models\File', 'id', 'pdf_file_id');
    }

    public function xml(){
        return $this->hasOne('App\Models\File', 'id', 'xml_file_id');
    }
}
