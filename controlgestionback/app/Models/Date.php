<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Date extends Model
{
    use HasFactory;

    protected $table="dates";

    protected $fillable = [
        'title',
        'description',
        'start',
        'startDate',
        'endDate',
        'cat_contract_type_id',
        'color'
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
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

}
