<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    protected $table="tipologias";
    protected $primaryKey = 'TIPOLOGIAID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TIPOLOGIAID',
        'TIPOLOGIAID'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('TIPOLOGIAID', 'like', '%' . $search . '%');
                    $q->orWhere('TIPOLOGIANOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
