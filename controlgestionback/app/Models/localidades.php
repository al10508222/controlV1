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
        'id',
        'entidad_id',
        'municipio_id',
        'consecutivo',
        'localidad_nombre',
        'cp'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('entidad_id', 'like', '%' . $search . '%');
                    $q->orWhere('municipio_id', 'like', '%' . $search . '%');
                    $q->orWhere('consecutivo', 'like', '%' . $search . '%');
                    $q->orWhere('localidad_nombre', 'like', '%' . $search . '%');
                    $q->orWhere('cp', 'like', '%' . $search . '%');

                }
            });
        });
    }
}
