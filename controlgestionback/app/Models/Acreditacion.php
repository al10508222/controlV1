<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acreditacion extends Model
{
    protected $table="estatus_acreditacion";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ESTATUSACREDITACIONID',
        'ESTATUSACREDITACIONNOMBRE'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('ESTATUSACREDITACIONID', 'like', '%' . $search . '%');
                    $q->orWhere('ESTATUSACREDITACIONID', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
