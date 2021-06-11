<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class municipios extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="municipios";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'entidad_id',
        'consecutivo',
        'municipio_nombre'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('entidad_id', 'like', '%' . $search . '%');
                    $q->orWhere('consecutivo', 'like', '%' . $search . '%');
                    $q->orWhere('municipio_nombre', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
