<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class instituciones_admor extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="institucion_adm_or";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'INSTITUCIONADMORID',
        'INSTITUCIONADMORNOMBRE'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('INSTITUCIONADMORID', 'like', '%' . $search . '%');
                    $q->orWhere('INSTITUCIONADMORNOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
