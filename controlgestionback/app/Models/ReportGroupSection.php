<?php

namespace App\Models;

use App\Models\CatReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportGroupSection extends Model
{
    use HasFactory;
    protected $table = 'reports_group_section';


    protected $fillable = [
        'name',
        'report_group_id'
    ];

    public function elements()
    {
        return $this->hasMany('App\Models\CatReport', 'reports_section_id', 'id');
    }
}
