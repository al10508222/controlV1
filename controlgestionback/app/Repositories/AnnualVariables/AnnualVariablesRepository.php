<?php


namespace app\Repositories\AnnualVariables;

use App\Models\Catalogs\CatYearlyVariable;
use App\Repositories\BaseRepository;

class AnnualVariablesRepository extends BaseRepository
{
    protected $model;

    public function __construct(CatYearlyVariable $model)
    {
        $this->model = $model;
    }

}
    

