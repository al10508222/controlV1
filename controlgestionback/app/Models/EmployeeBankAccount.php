<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBankAccount extends Model
{
    use HasFactory;

    protected $fillable = ['cat_bank_id', 'clabe', 'account', 'cat_bank_account_type_id']; 

    protected $with = ['bank'];

    public function bank() {
        return $this->hasOne('App\Models\Catalogs\CatBank', 'id', 'cat_bank_id');
    }
    public function catBankType() {
        return $this->hasOne('App\Models\Catalogs\CatBankAccountType', 'id', 'cat_bank_account_type_id');
    }
}
