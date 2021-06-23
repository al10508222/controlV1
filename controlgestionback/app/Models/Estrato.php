<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estrato extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="entidades";
    protected $primaryKey = 'ESTRATOUNIDADID';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ESTRATOUNIDADID',
        'ESTRATOUNIDADNOMBRE'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('ESTRATOUNIDADID', 'like', '%' . $search . '%');
                    $q->orWhere('ESTRATOUNIDADNOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
