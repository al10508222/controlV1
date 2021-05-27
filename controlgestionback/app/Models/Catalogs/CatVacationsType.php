<?php

namespace App\Models\Catalogs;

use App\Models\LawVacations;
use App\Models\VacationsTypesPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatVacationsType extends Model
{
    public const FIXED = 'fixed';
    public const LAW = 'law';

    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $search)
    {
        return $query->when(!empty($search), function ($query) use ($search) {
            return $query->where('name', 'ilike', "%$search%");
        });
    }

    public function periods() {
        return $this->hasMany(VacationsTypesPeriod::class, 'cat_vacations_type_id');
    }

    public function law_vacations() {
        return $this->hasOne(LawVacations::class, 'id','law_vacations_id');
    }

    public function normalized($startTag = 'start', $endTag = 'end') {
        $periods = [];
        foreach ($this->periods as $period) {
            $p = ['id' => $period->id];
            $day = str_pad($period->start_day, 2, '0');
            $month = str_pad($period->start_month, 2, '0');
            $p[$startTag] = "$day/$month";

            $day = str_pad($period->end_day, 2, '0');
            $month = str_pad($period->end_month, 2, '0');
            $p[$endTag] = "$day/$month";

            $periods[] = $p;
        }
        return $periods;
    }
}
