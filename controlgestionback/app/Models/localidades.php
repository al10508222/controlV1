<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class localidades extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="localidades";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
        'ENTIDADFEDERATIVAID',
        'MUNICIPIOID',
        'LOCALIDADID',
        'LOCALIDADNOMBRE',
        'LOCALIDADCODIGOPOSTAL',
        'LOCALIDADAMBITO',
        'LOCALIDADLATITUD',
        'LOCALIDADLOINGITUD',
        'LOCALIDADLATITUDDEC',
        'LOCALIDADLOINGITUDDEC',
        'LOCALIDADALTITUD'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('LOCALIDADNOMBRE', 'like', '%' . $search . '%');
                    $q->orWhere('LOCALIDADCODIGOPOSTAL', 'like', '%' . $search . '%');
                    $q->orWhere('LOCALIDADAMBITO', 'like', '%' . $search . '%');
                    $q->orWhere('LOCALIDADID', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
