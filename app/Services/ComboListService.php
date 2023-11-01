<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ComboListRepository;
use App\Repositories\ComboProductRepository;

class ComboListService
{
    protected ComboListRepository $comboList;
    protected  ComboProductRepository $comboProduct;
    public function __construct(ComboListRepository $comboListRepository)
    {
        $this->comboList = $comboListRepository;
    }
    public function getAll()
    {
        return $this->comboList->getAll();
    }
    public function getFive()
    {
        return $this->comboList->getFive();
    }
    public function delete($id)
    {
        $this->comboList->delete($id);
    }
    public function show($id)
    {
        return $this->comboList->show($id);
    }


    public function search($searchInput)
    {
        return $this->comboList->search($searchInput);
    }
    public function update(Request $request, $listProductName)
    {
        $payload = [
            'id' => $request->id,
            'name' => $request->comboName,
            'introduce' => implode('/', $listProductName),
            'price' => $request->comboPrice,
        ];
        $this->comboList->update($payload);
    }
    public function Store(Request $request, $listProductName)
    {
        $payload = [
            'name' => $request->comboName,
            'introduce' => implode('/', $listProductName),
            'price' => $request->comboPrice,
        ];
        return $this->comboList->store($payload);
    }
}
