<?php

namespace App\Models;

use App\Models\ReportGroupSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportGroup extends Model
{
    use HasFactory;
    protected $table = 'reports_group';
    
    protected $fillable = [
        'name',
    ];


    public function sections()
    {
        return $this->hasMany('App\Models\ReportGroupSection');
        //->orderBy('report_group_id', 'DESC')
    }
}
