<?php

namespace App\Models\Catalogs;

use App\Models\EmployeeDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\Catalogs\CatModule;

class CatDocument extends Model
{
    use HasFactory;

    protected $with = ['CatModule'];

    protected $fillable = [
        'name',
        'cat_module_id',
        'observations',
        'is_required',
        'is_visible',
    ];

    public function contractTypes()
    {
        return $this->hasMany('App\Models\Catalogs\CatDocumentsContractType','cat_document_id');
    }

    public function employeeDocument(){
        return $this->belongsTo('App\Models\EmployeeDocument','id','cat_document_id');
    }

    public function CatModule()
    {
        return $this->hasOne(CatModule::class,'id','cat_module_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when(! empty ($search), function ($query) use ($search) {

            return $query->where(function($q) use ($search)
            {
                if (isset($search) && !empty($search)) {
                    $q->orWhere('name', 'like', '%' . $search . '%');
                    $q->orWhere('observations', 'like', '%' . $search . '%');
                }
            });
        });
    }

    public function scopeEmployeeFiles($query, $employee)
    {
        return $this->with(['files' => function($q) use ($employee) {
            $q->where('employee_id', '=', $employee)
                ->latest();
        }]);
    }

    public function files() {
        return $this->hasMany(EmployeeDocument::class);
    }
}
