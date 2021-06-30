<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipologia extends Model
{
    protected $table="tipologias";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'TIPOLOGIAID',
        'TIPOLOGIANOMBRE'
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
