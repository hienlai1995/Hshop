@extends('pages.adminpages.admin-index')
@section('combos')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }
    .oderContainer {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: max-content;
        justify-content: center;
        align-items: center;
    }
  </style>
  <title>Thông Tin Đơn Hàng</title>
</head>
<body>
  <div class="oderContainer">
    
  <h2>Thông Tin Đơn Hàng</h2>

  <table>
    <thead>
      <tr>
        <th>Số Thứ Tự</th>
        <th>USER_ID</th>
        <th>Đơn Giá</th>
        <th>Ngày Tạo</th>
        <th>Xem</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dữ liệu sẽ được điền vào đây -->
       @foreach($order as $item)
       <tr>
        <td>{{$i+=1}}</td>
        <td>{{$item->user_id}}</td>
        <td>{{$item->totalprice}}</td>
        <td>{{$item->created_at}}</td>
        <td><a href="{{ route('order.detail',['id'=>$item->id]) }}" >xem</a></td>
      </tr>
       @endforeach
      
      <!-- Thêm các dòng khác tương tự nếu cần -->
    </tbody>
  </table>
     <div class="paginationContai">
       {{$order->links()}}
     </div>
  </div>
</body>
</html>

@endsection