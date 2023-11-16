<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    //
    protected  $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        $order = Order::paginate(15);
        return view('pages.adminpages.order-index', compact('order'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function detail(Request $request)
    {
        if ($order = Order::find($request->id) != null) {
            $order = Order::find($request->id);
            $product = $order->products;
            $user = User::find($order->user_id)->name;
            return view('pages.adminpages.order-detail', compact(['order', 'product', 'user']));
        }
    }
}
