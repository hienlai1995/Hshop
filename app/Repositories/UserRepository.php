<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new User();
    }
    public function checkUer($AddData)
    {
        return  $this->model->where('email', $AddData['email'])->first();
    }
    public function store($payload)
    {

        return $this->model->create($payload);
    }
}
