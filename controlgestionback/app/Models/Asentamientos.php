<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asentamientos extends Model
{
    protected $table="tipo_asentamientos";
    protected $primaryKey = 'TIPOASENTAMIENTOID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TIPOASENTAMIENTOID',
        'TIPOASENTAMIENTONOMBRE'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('TIPOASENTAMIENTOID', 'like', '%' . $search . '%');
                    $q->orWhere('TIPOASENTAMIENTONOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
