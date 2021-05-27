<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'cat_payment_statuses_id', 'payment_id'];

    protected $with = ['Payment', 'CatPaymentStatuses', 'User'];

    public function CatPaymentStatuses() {
        return $this->hasOne('App\Models\Catalogs\CatPaymentStatuses','id', 'cat_payment_statuses_id');
    }

    public function Payment() {
        return $this->hasOne('App\Models\Payment','id', 'payment_id');
    }

    public function User() {
        return $this->hasOne('App\Models\User','id', 'user_id');
    }


    public function scopeSearch($query, $search) 
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('user_id', 'like', '%' . $search . '%');
                    $q->orWhere('cat_payment_statuses', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
