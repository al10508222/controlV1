<?php

namespace App\Models\Catalogs;

use App\Models\ReportManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatModule extends Model
{
    use HasFactory;
    
    const EMPLOYEES = 10;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function reportManager()
    {
        return $this->hasMany(ReportManager::class,'cat_module_id','id');

    }
}