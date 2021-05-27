<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiringMemo extends Model
{
    use HasFactory;

    protected $with = ['HiringMemoDocument','Project'];

    protected $fillable = [
      'id',
      'name',
      'project_id',
      'comments'
  ];

  public function HiringMemoDocument()
  {
      return $this->hasOne('App\Models\HiringMemoDocument');
  }

  public function Project()
  {
      return $this->hasOne(Project::class,'id','project_id');
  }

  protected $hidden = [
      'created_at',
      'updated_at'
  ];

  

  public function scopeSearch($query, $search) 
  {
      return $query->when(! empty ($search), function ($query) use ($search) {

          return $query->where(function($q) use ($search)
          {
              if (isset($search) && !empty($search)) {
                  $q->where('name', 'like', '%' . $search . '%');
                
              }
          });
      });
  } 
}
