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

    public function getOrders($pagination)
    {
        /** @var User $user */
        $user = $this->getModel();
        $builder = $user->orders()->withCount('mealOrders');

        if ($pagination) {
            $orders = $builder->paginate($pagination);
        } else {
            $orders = $builder->get();
        }

        return $orders;
    }
}
