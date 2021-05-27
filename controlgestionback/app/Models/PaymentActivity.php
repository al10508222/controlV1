<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cat_payment_activity_status_id',
        'progress'
    ];

    public function status(){
        return $this->hasOne('App\Models\Catalogs\CatPaymentActivityStatus', 'id', 'cat_payment_activity_status_id');
    }
}
