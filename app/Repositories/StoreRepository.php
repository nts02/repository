<?php

namespace App\Repositories;

use App\Models\Store;

class StoreRepository extends BaseRepository
{
    protected $model;

    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return Store::class;
    }

    public function getListStore()
    {
        return $this->index();
    }
}
