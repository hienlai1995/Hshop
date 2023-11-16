@extends('pages.adminpages.admin-index')
@section('orderdetail')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.order-details {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.order-details h2 {
    color: #333;
    text-align: center;
}

.order-info {
    margin-bottom: 20px;
}

.order-info p {
    margin: 8px 0;
}

.order-items h3 {
    color: #333;
}

.order-items ul {
    list-style-type: none;
    padding: 0;
}

.order-items li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.item-name {
    flex: 1;
}

.item-quantity,
.item-price {
    min-width: 60px;
    text-align: right;
}

.order-total p {
    text-align: right;
    font-weight: bold;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div class="order-details">
        <h2>Chi Tiết Đơn Hàng</h2>
        <div class="order-info">
            <p><strong>Số Đơn Hàng:</strong> {{$order->id}}</p>
            <p><strong>Ngày Đặt Hàng:</strong> {{$order->created_at}}</p>
            <p><strong>Tên Người Đặt:</strong> {{$user}}</p>
        </div>
        <div class="order-items">
            <h3>Các Mặt Hàng</h3>
            <ul>
                
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->quantity}}</td>
                            <td>{{$item->price}}</td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
                
            </ul>
        </div>
        <div class="order-total">
            <p><strong>Tổng Cộng:</strong> {{$order->totalprice}}</p>
        </div>
    </div>
</body>
</html>


@endsection