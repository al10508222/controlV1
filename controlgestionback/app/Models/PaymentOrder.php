<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $fillable = ['folio', 'description'];
    protected $appends = ['net_total'];
    
    public function getNetTotalAttribute() {
        return $this->payments->sum('total_amount');      
    }

    public function bbva_payments() {
        $id = 6;
        return $this->hasMany('App\Models\Payment')
            ->whereHas('employee.account', function ($q) use ($id) {
                $q->where('cat_bank_id', $id);
        });
    }

    public function interbank_payments() {
        $id = 6;
        return $this->hasMany('App\Models\Payment')
            ->whereHas('employee.account', function ($q) use ($id) {
                $q->where('cat_bank_id', '!=', $id);
        });
    }

    /* Relations */
    public function payments() 
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function scopeSearch($query, $search) 
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('folio', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
