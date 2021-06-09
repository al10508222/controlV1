<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VialidadesModel extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="tipo_vialidad";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'vialidad_nombre'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('id', 'like', '%' . $search . '%');
                    $q->orWhere('vialidad_nombre', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
