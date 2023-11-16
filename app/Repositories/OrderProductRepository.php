<?php

namespace App\Repositories;

use App\Models\OrderProduct;

class OrderProductRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new OrderProduct();
    }
    function create($payload)
    {
        return $this->model->create($payload);
    }
}
