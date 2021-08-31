<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class ModelService
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model): ModelService
    {
        $this->model = $model;

        return $this;
    }
}
