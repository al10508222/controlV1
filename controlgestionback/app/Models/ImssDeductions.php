<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImssDeductions extends Model
{
    use HasFactory;
    protected $table = "imss_deductions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'year',
    ];

    /**
     * Get the ImssConfig .
     */
    public function imssConfig()
    {
        return $this->hasMany('App\Models\ImssConfig', 'imss_deduction_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->where('name', 'like', '%' . $search . '%');
                    $q->orWhere('year', 'like', '%' . $search . '%');
                }
            });
        });
    }
}
