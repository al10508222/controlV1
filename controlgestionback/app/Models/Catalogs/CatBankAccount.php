<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatBankAccount extends Model
{
    use HasFactory, SoftDeletes;



    protected $fillable = ['cat_bank_id', 'cat_bank_account_type_id', 'name', 'clabe', 'account'];

    public function bank() {
        return $this->hasOne('App\Models\Catalogs\CatBank', 'id', 'cat_bank_id');
    }

    
    public function scopeSearch($query, $search) 
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
