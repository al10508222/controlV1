<?php


namespace app\Repositories\Unit;

use App\Models\Catalogs\CatUnit;
use App\Repositories\BaseRepository;

class UnitRepository extends BaseRepository
{
    protected $model;

    public function __construct(CatUnit $model)
    {
        $this->model = $model;
    }

}
    

