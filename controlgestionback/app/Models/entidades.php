<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class entidades extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="entidades";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'entidad_nombre',
        'entidad_nombre_corto'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('entidad_nombre', 'like', '%' . $search . '%');
                    $q->orWhere('entidad_nombre_corto', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
