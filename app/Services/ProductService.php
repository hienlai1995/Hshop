<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function getFive()
    {
        return $this->productRepo->getFive();
    }
    public function getAll()
    {
        return $this->productRepo->getAll();
    }
    public function delete($id)
    {
        $this->productRepo->delete($id);
    }

    public function search($searchInput)
    {
        return $this->productRepo->search($searchInput);
    }
    public function update(Request $request)
    {
        $payload = [
            'id' => $request->id,
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'introduce' => $request->input('introduce'),
            'path' => $request->input('path'),
        ];
        return $this->productRepo->update($payload);
    }
    public function Store(Request $request)
    {
        $payload = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'introduce' => $request->input('introduce'),
            'path' => $request->input('path'),
        ];
        return $this->productRepo->store($payload);
    }
}
