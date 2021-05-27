<?php


namespace app\Repositories\CustomFields;

use App\Models\Catalogs\CatCustomField;
use App\Repositories\BaseRepository;

class CustomFieldsRepository extends BaseRepository
{
    protected $model;

    public function __construct(CatCustomField $model)
    {
        $this->model = $model;
    }

}
    

