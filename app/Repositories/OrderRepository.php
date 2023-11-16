<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Order();
    }
    function create($payload)
    {
        return $this->model->create($payload);
    }
    function find($orderId)
    {
        return $this->model->find($orderId);
    }
}
