<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Services\ProductService;

class Admincontroller extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {

        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService;
        return view('pages.adminpages.admin-product', compact('products'))->with('i', request()->input('page', 1));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.adminpages.admin-addproduct');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'introduce' => 'required|max:200',
            'path' => 'required',
        ]);
        $this->productService->store($request);
        return redirect('/admin')->with('success', 'Product add successfully');
    }
    /**
     * edit the specified resource in storage.
     */
    public function edit(Request $request, $id)
    {
        $product = Products::find($id);
        return view('pages.adminpages.admin-editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'introduce' => 'required',
            'path' => 'required',
        ]);
        $this->productService->update($request);
        return redirect()->route('admin')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('admin')->with('success', 'Product deleted successfully');
    }
    // search
    public function search(Request $request)
    {
        $searchTerm = $request->input('adminSearch');
        // Tìm kiếm trong cơ sở dữ liệu
        $results = $this->productService->search($searchTerm);
        return view('pages.adminpages.admin-search', compact('results', 'searchTerm'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    // logouts
    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        return redirect('/');
    }
}
