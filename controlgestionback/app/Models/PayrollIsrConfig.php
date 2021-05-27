<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollIsrConfig extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payroll_isr_configs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'year',
        'cat_periodicity_type_id'
      ];
    /**
     * Get the IsrWithholdings .
     */
    public function isrWithholdings()
    {
        return $this->hasMany('App\Models\IsrWithholdings', 'payrolls_isr_config_id');
    }

    /**
     * Get the pay1rolls that own.
     */
    public function periodicity()
    {
        return $this->belongsTo('App\Models\Catalogs\CatPeriodicityType', 'cat_periodicity_type_id');
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
