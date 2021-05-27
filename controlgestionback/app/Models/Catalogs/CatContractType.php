<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatContractType extends Model
{
    use HasFactory;

    const INSTITUTIONAL = 1;
    const EVENTUAL = 2;
    const SCHOLAR = 3;

    protected $fillable = [
        'name',
        'christmas_bonus_days',
        'holidays',
        'cat_vacations_type_id',
        'gratification_days'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('name', 'like', '%' . $search . '%');
                }
            });
        });
    }

    public function vacations_type() {
        return $this->hasOne(CatVacationsType::class, 'id', 'cat_vacations_type_id');
    }
}