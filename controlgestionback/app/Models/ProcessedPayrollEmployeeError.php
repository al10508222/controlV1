<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedPayrollEmployeeError extends Model
{
    use HasFactory;

    public function scopeSearch($q, $search)
    {
        return $q->when(!empty ($search), function ($query) use ($search) {
            return $query->where(function ($q) use ($search) {
                if (isset($search) && !empty($search)) {
                    $q->where('error', 'ilike', "%$search%");
                }
            })
                ->whereHas('employee', function ($query) use ($search) {
                    $query->search($search);
                });
        });
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
