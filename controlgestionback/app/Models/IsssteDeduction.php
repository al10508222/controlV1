<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsssteDeduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
    ];

    public function isssteConfig()
    {
        return $this->hasMany('App\Models\IsssteConfig', 'issste_deduction_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                    $q->orWhere('year', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
