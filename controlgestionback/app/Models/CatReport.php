<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReportGroupSection;
class CatReport extends Model
{   
    use HasFactory;
    protected $table = 'cat_reports';
    public function catSection(){
        return $this->hasOne(ReportGroupSection::class, 'id', 'reports_section_id');
    }

}
