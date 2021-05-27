<?php


namespace app\Repositories\Location;

use App\Models\Catalogs\CatEmploymentLocation;
use App\Repositories\BaseRepository;

class LocationRepository extends BaseRepository
{
    protected $model;

    public function __construct(CatEmploymentLocation $model)
    {
        $this->model = $model;
    }

}
    

