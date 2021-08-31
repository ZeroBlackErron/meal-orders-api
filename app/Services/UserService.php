<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService extends ModelService
{
    /**
     * @var User
     */
    protected $model;

    public function create($attributes)
    {
        return (new UserRepository())->make($attributes)->save();
    }
}
