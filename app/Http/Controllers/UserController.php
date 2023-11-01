<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;


class UserController extends Controller
{

    public function index()
    {
        $products = Products::paginate(8);
        return view('pages.userpages.homeUser', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function buy(Request $request)
    {
        dd($request->id);
        // $products = Products::paginate(8);
        // return view('pages.userpages.homeUser', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
