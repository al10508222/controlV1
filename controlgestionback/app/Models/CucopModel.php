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
        'tipo_contratacion'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('tipo', 'like', '%' . $search . '%');
                    $q->orWhere('clave_cucop', 'like', '%' . $search . '%');
                    $q->orWhere('partida_especifica', 'like', '%' . $search . '%');
                    $q->orWhere('descripcion', 'like', '%' . $search . '%');
                    $q->orWhere('nivel', 'like', '%' . $search . '%');
                    $q->orWhere('cabm', 'like', '%' . $search . '%');
                    $q->orWhere('unidad_medida', 'like', '%' . $search . '%');
                    $q->orWhere('tipo_contratacion', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
