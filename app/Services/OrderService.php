<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductRepository;
use App\Repositories\OrderProductRepository;

class OrderService
{
    protected OrderRepository $orderRepository;
    protected ProductRepository $productRepository;
    protected OrderProductRepository $orderProductRepository;

    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository, OrderProductRepository $orderProductRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->orderProductRepository = $orderProductRepository;
    }
    function handeldata($dataCart)
    {

        try {
            // A : ghi dữ liệu vào bảng order
            // dựa vào số lượng tính tổng tiền 
            $data = $dataCart["data"];
            // tạo một mảng mới gồm id sản phẩm có trong giỏ hàng và giá tiền của chúng lấy từ DB xuống
            $listIdProductInCart = array();
            foreach ($data as $iteam) {
                array_push($listIdProductInCart, $iteam["id"]);
            }
            //  kết nối với db lấy thông tin các sản phẩm theo list id
            $listProductInformation = $this->productRepository->searchByCart($listIdProductInCart);
            // tính tổng hóa đơn của khách thông qua số lượng của $data và giá tiền của $listProductInformation
            $totalPrice = 0;
            for ($i = 0; $i < count($data); $i++) {
                for ($j = 0; $j < count($listProductInformation); $j++) {
                    if ($data[$i]["id"] == $listProductInformation[$j]["id"]) {
                        $totalPrice += (intval($data[$i]["quantity"])  * intval($listProductInformation[$j]["price"]));
                    }
                }
            }
            // lấy id của người đăng nhập hiện tại
            $userId =  Auth::guard('user')->id();
            $payload = [
                "user_id" => $userId,
                "totalprice" => $totalPrice
            ];
            $orderId = $this->orderRepository->create($payload)->id;
            // B: ghi dữ liệu vào bảng ORDER_PRODUCT
            //   tìm order vừa được ghi
            $order = $this->orderRepository->find($orderId);
            //  tạo dữ liệu để ghi vào bảng trung gian
            $dataToSendOrderProductModel = [];
            foreach ($data as $item) {
                $dataToSendOrderProductModel[$item["id"]] = ['quantity' => $item["quantity"]];
            }
            // ghi dữ liệu vào db
            // $product->categories()->sync($categoryData);
            $order->products()->sync($dataToSendOrderProductModel);
            return response()->json(['success' => true, 'message' =>  "thêm dữ liệu thành công"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500,);
        }
    }
}
