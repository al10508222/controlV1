<?php

namespace app\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



abstract class BaseRepository
{

  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }


  public function create($data)
  {
    return $this->model->create($data);
  }

  public function update($id, $data)
  {
    $object = $this->model->find($id);
    $object->update($data);
    return $object;
  }

  public function edit($id)
  {
    $object = $this->model->find($id);
    return $object;
  }

  public function delete($id)
  {
    $register = $this->model->find($id);
    $register->delete();
  }








}
