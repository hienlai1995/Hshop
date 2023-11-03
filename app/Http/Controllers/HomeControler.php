<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;

class HomeControler extends Controller
{
    public function index()
    {
        $products = Products::paginate(8);
        return view('pages.userpages.home', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function login()
    {
        return view('pages.userpages.login');
    }
    public function admin()
    {
        $products = Products::paginate(5);
        return view('pages.adminpages.admin-product', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function store(Request $request)
    {
        $request->validate([
            "loginKey" => "required",
            "password" => "required|min:6"
        ]);
   
        $dataLoginClient = $request->input();

        if (Auth::guard('admin')->attempt(["email" => $dataLoginClient["loginKey"], "password" => $dataLoginClient["password"]])) {
            $products = Products::paginate(5);
            return view('pages.adminpages.admin-product', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
        }

        if (Auth::guard('user')->attempt(["email" => $dataLoginClient["loginKey"], "password" => $dataLoginClient["password"]])) {
            return redirect()->route('user.index');
        }

        return redirect()->route("login")->withErrors(["loginKey" => "username không đúng ,vui lòng kiểm tra lại", "password" => "password không đúng vui lòng kiểm tra lại"]);
    }
}
