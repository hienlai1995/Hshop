<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\ComboListService;
use App\Services\ComboProductService;


use function PHPUnit\Framework\isEmpty;

class ComboListController extends Controller
{
    protected  $productService;
    protected  $comboListService;
    protected  $comboProductSevice;

    public function __construct(ProductService $productService, ComboListService $comboListService, ComboProductService $ComboProductService)
    {
        $this->productService = $productService;
        $this->comboListService = $comboListService;
        $this->comboProductSevice = $ComboProductService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $combolist = $this->comboListService->getFive();
        return view('pages.adminpages.admin-combos', compact('combolist'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = $this->productService;
        return view('pages.adminpages.admin-combo-addproduct', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }
    public function handlePostRequestForAddCombo(Request $request)
    {
        try {
            // Lấy dữ liệu từ yêu cầu
            $selectedProductIds = $request->input('selectedProductIds');
            $listProduct = $this->productService->getAll();
            $listProductName = [];
            foreach ($selectedProductIds as $iteamID) {
                foreach ($listProduct as $iteams) {
                    if ($iteamID == $iteams->id) {
                        $listProductName[$iteamID] =  $iteams->name . ':' . $iteamID;
                        break;
                    }
                }
            }
            $comboName = $request->input('comboName');
            $comboPrice = $request->input('comboPrice');
            $isPrice = !empty($comboPrice) && is_numeric($comboPrice);

            if (!empty($selectedProductIds) && !empty($comboName) && $isPrice) {
                $comboId = $this->comboListService->Store($request, $listProductName, $comboPrice);
                $this->comboProductSevice->Store($selectedProductIds, $comboId);
                return response()->json(['success' => true, 'message' => 'thêm combo thành công']);
            } else {

                return response()->json(['success' => false, 'message' => 'thêm combo không thành công']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi xử lý yêu cầu.', $e], 500,);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $comboShow = $this->comboListService->show($id);
        $productShow = $comboShow->products;
        return view('pages.adminpages.admin-detailcombo', compact(['comboShow', 'productShow']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $comboEit = $this->comboListService->search($request->id);
        $listProduct = $this->productService->getAll();
        // lấy id của các sản phẩm có trong combo
        $listProductSelect = preg_split("/[,:|\/]/", $comboEit->introduce, -1, PREG_SPLIT_NO_EMPTY);
        $listProductIdSelect = [];
        foreach ($listProductSelect as $iteam) {
            if (is_numeric($iteam)) {
                array_push($listProductIdSelect, (int)$iteam);
            }
        }
        $lisProduct = [];
        foreach ($listProduct as $iteam) {
            array_push($lisProduct, $iteam->id);
        }
        $listProductAvailible = array_diff($lisProduct, $listProductIdSelect);

        return view('pages.adminpages.admin-editcombo', compact(['comboEit', 'listProduct', 'listProductAvailible', 'listProductIdSelect']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // Lấy dữ liệu từ yêu cầu
            $selectedProductIds = $request->input('selectedProductIds');
            $listProduct = $this->productService->getAll();
            $listProductName = [];
            foreach ($selectedProductIds as $iteamID) {
                foreach ($listProduct as $iteams) {
                    if ($iteamID == $iteams->id) {
                        $listProductName[$iteamID] =  $iteams->name . ':' . $iteamID;
                        break;
                    }
                }
            }
            $comboName = $request->input('comboName');
            $comboPrice = $request->input('comboPrice');
            if (!empty($selectedProductIds) && !empty($comboName) && !empty($comboPrice) && is_numeric($comboPrice)) {
                $this->comboListService->update($request, $listProductName, $comboPrice);
                $this->comboProductSevice->update($selectedProductIds, $request);
                return response()->json(['success' => true, 'message' => 'cập nhật combo thành công']);
            } else {
                return response()->json(['success' => false, 'message' => 'cập nhật combo không thành công']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi xử lý yêu cầu.', $e], 500,);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->comboListService->delete($id);
        $this->comboProductSevice->delete($id);
        return redirect()->route('combo.listcombos');
    }
}
