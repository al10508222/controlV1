<?php


namespace app\Repositories\Date;

use App\Models\Date;
use App\Repositories\BaseRepository;

class DateRepository extends BaseRepository
{
    protected $model;

    public function __construct(Date $model)
    {
        $this->model = $model;
    }

}
    

