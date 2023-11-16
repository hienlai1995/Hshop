<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Admin();
    }
    public function checkAdmin($AddData)
    {
        return  $this->model->where('email', $AddData['email'])->first();
    }
    public function store($payload)
    {
        return $this->model->create($payload);
    }
}
