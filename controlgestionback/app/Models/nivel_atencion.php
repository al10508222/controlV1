<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nivel_atencion extends Model
{
    // use HasFactory, SoftDeletes;
    
    protected $table="nivel_atencion";
    protected $primaryKey = 'NIVELATENCIONID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NIVELATENCIONID',
        'NIVELATENCIONNOMBRE'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('NIVELATENCIONID', 'like', '%' . $search . '%');
                    $q->orWhere('NIVELATENCIONNOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}