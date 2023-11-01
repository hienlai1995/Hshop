<?php

namespace App\Repositories;

use App\Models\ComboProduct;

class ComboProductRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new ComboProduct();
    }

    public function getAll()
    {
        return  $this->model = ComboProduct::get();
    }
    public function getFive()
    {
        return  $this->model = ComboProduct::paginate(5);
    }
    public function delete($id)
    {
        $this->model->where('combo_id', 'like', '%' . $id . '%')->delete();
    }
    public function search($searchInput)
    {
    }
    public function update($payload)
    {
    }
    public function store($comboId, $iteam)
    {
        $payload = [
            'product_id' => $iteam,
            'combo_id' => $comboId
        ];
        $this->model->create($payload);
    }
}
