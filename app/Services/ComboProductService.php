<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\ComboProductRepository;

class ComboProductService
{
    protected ComboProductRepository $comboProduct;
    public function __construct(ComboProductRepository $comboProductRepo)
    {
        $this->comboProduct = $comboProductRepo;
    }
    public function getAll()
    {
        return $this->comboProduct->getAll();
    }
    public function getFive()
    {
        return $this->comboProduct->getFive();
    }
    public function delete($id)
    {
        $this->comboProduct->delete($id);
    }

    public function search($searchInput)
    {
        return $this->comboProduct->search($searchInput);
    }
    public function update($selectedProductIds, Request $request)
    {
        $this->comboProduct->delete($request->id);
        foreach ($selectedProductIds as $iteam) {
            $this->comboProduct->store($request->id, $iteam);
        }
    }
    public function Store($selectedProductIds, $comboId)
    {
        foreach ($selectedProductIds as $iteam) {
            $this->comboProduct->store($comboId, $iteam);
        }
    }
}
