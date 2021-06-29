<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class establecimientos extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="establecimiento";
    protected $primaryKey = 'TIPOESTABLECIMIENTOID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TIPOESTABLECIMIENTOID',
        'TIPOESTABLECIMIENTONOMBRE'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('TIPOESTABLECIMIENTOID', 'like', '%' . $search . '%');
                    $q->orWhere('TIPOESTABLECIMIENTONOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}