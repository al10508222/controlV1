<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jurisdicciones extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="jurisdiccion";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'ENTIDADFEDERATIVAID',
        'JURISDICCIONID',
        'JURISDICCIONNOMBRE'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->Where('JURISDICCIONID', $search  );
                    $q->orWhere('ENTIDADFEDERATIVAID', $search  );
                    $q->orWhere('JURISDICCIONNOMBRE', $search  );
                }
            });
        });
    }
}
