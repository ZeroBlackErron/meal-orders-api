<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class ModelRepository
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
    public function setModel(Model $model): ModelRepository
    {
        $this->model = $model;

        return $this;
    }

    public function save()
    {
        $this->getModel()->save();

        return $this->model;
    }

    public function update(array $attributes)
    {
        $this->getModel()->update($attributes);

        return $this->model;
    }
}
