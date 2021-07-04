<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class instituciones extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="institucions";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'INSTITUCIONID',
        'INSTITUCIONNOMBRE',
        'INSTITUCIONIDCORTO'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('INSTITUCIONID', 'like', '%' . $search . '%');
                    $q->orWhere('INSTITUCIONNOMBRE', 'like', '%' . $search . '%');
                    $q->orWhere('INSTITUCIONIDCORTO', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
