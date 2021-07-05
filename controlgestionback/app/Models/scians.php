<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scians extends Model
{
    protected $table="scians";
    protected $primaryKey = 'SCIANID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'SCIANID',
        'SCIANNOMBRE'
      ];

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('SCIANID', 'like', '%' . $search . '%');
                    $q->orWhere('SCIANNOMBRE', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
