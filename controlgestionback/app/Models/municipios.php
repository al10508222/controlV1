<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class municipios extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="municipios";
    protected $primaryKey = 'MUNICIPIOID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MUNICIPIOID',
        'ENTIDADFEDERATIVAID',
        'MUNICIPIONOMBRE'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('ENTIDADFEDERATIVAID', 'like', '%' . $search . '%');
                    $q->orWhere('MUNICIPIONOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
