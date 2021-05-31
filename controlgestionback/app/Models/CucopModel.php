<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CucopModel extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="catalogo_cucop";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'tipo',
        'clave_cucop',
        'partida_especifica',
        'clave_cucop2',
        'descripcion',
        'nivel',
        'cabm',
        'unidad_medida',
        'tipo_adquisicion',
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('tipo', 'like', '%' . $search . '%');
                    $q->where('clave_cucop', 'like', '%' . $search . '%');
                    $q->where('partida_especifica', 'like', '%' . $search . '%');
                    $q->where('descripcion', 'like', '%' . $search . '%');
                    $q->where('nivel', 'like', '%' . $search . '%');
                    $q->where('cabm', 'like', '%' . $search . '%');
                    $q->where('unidad_medida', 'like', '%' . $search . '%');
                    $q->where('tipo_adquisicion', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
