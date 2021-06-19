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
        'ENTIDADFEDERATIVAID',
        'ENTIDADFEDERATIVANOMBRE',
        'ENTIDADFEDERATIVAABREVIACION'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('ENTIDADFEDERATIVANOMBRE', 'like', '%' . $search . '%');
                    $q->orWhere('ENTIDADFEDERATIVAABREVIACION', 'like', '%' . $search . '%');
                    $q->orWhere('ENTIDADFEDERATIVAID', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
