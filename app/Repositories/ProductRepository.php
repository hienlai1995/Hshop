<?php

namespace App\Repositories;

use App\Models\Products;

class ProductRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Products();
    }
    public function getFive()
    {
        return $this->model = Products::paginatin(5);
    }
    public function getAll()
    {
        return $this->model = Products::get();
    }
    public function delete($id)
    {
        $product = $this->model->find($id);
        $product->delete();
    }
    public function search($searchInput)
    {
        return $this->model->where('name', 'like', '%' . $searchInput . '%')
            ->orWhere('price', 'like', '%' . $searchInput . '%')
            ->orWhere('introduce', 'like', '%' . $searchInput . '%')
            ->orWhere('path', 'like', '%' . $searchInput . '%')
            ->paginate(5);
    }
    public function update($payload)
    {
        $this->model->find($payload['id'])->update($payload);
        return $this->model->orderBy('created_at', 'DESC')->get();
    }
    public function store($payload)
    {
        return $this->model->create($payload);
    }
}
