<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Services\OrderService;


class UserController extends Controller
{
    protected  $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        $products = Products::paginate(8);
        return view('pages.userpages.homeUser', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function payCart(Request $request)
    {

        $dataCart = $request->all();
        return $this->orderService->handeldata($dataCart);
    }
}
