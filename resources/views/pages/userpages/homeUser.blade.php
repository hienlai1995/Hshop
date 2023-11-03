@extends('layout')
@section('header')
    @include('pages.userpages.includes.headerUser')
@endsection
@section('content')
<div class="homecontainer">
    <div class="eventContent">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
            </div>
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <a href="#" class="carousel-item active">
                    <img src="https://cf.shopee.vn/file/vn-50009109-855920ad06c123973c4fb99cf6ac159f_xxhdpi" alt="Los Angeles" class="d-block" style="width:100%" height="250px">
                </a>
                <a href="#" class="carousel-item">
                    <img src="https://cf.shopee.vn/file/vn-50009109-ed6ff901a44628b9502cbf199ba2f153_xxhdpi" alt="Chicago" class="d-block" style="width:100%" height="250px">
                </a>
                <a href="#" class="carousel-item">
                    <img src="https://cf.shopee.vn/file/vn-50009109-5333cace9427bbc5494dd08505945393_xxhdpi" alt="New York" class="d-block" style="width:100%" height="250px">
                </a>
                <a href="#" class="carousel-item active">
                    <img src="https://cf.shopee.vn/file/vn-50009109-702f0e4b392b72da6c24ccec46f4a97f_xxhdpi" alt="Los Angeles" class="d-block" style="width:100%" height="250px">
                </a>
                <a href="#" class="carousel-item">
                    <img src="https://cf.shopee.vn/file/vn-50009109-8d8caf1759ee1a2084876b625efc9786_xxhdpi" alt="Chicago" class="d-block" style="width:100%" height="250px">
                </a>
                <a href="#" class="carousel-item">
                    <img src="https://cf.shopee.vn/file/vn-50009109-27897f6c9751178aa991bdc2c13b28cd_xxhdpi" alt="New York" class="d-block" style="width:100%" height="250px">
                </a>

            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
        <div class="subEvent">
            <a href="#" class="subEventIteam">
                <img src="https://cf.shopee.vn/file/vn-50009109-7df0b9a87c030513eb04f07e6a0e4a19_xhdpi" alt="" width="100%" height="100%">
            </a>
            <a href="#" class="subEventIteam">
                <img src="https://cf.shopee.vn/file/vn-50009109-e3181371c80a7bd2045db36a3406758a_xhdpi" alt="" width="100%" height="100%">
            </a>
        </div>
    </div>
    <!-- product -->
    <div class="homeProductContainer">
        <div class="listTitle">DANH SÁCH SẢN PHẨM</div>
        <div class="productList">
             @foreach ($products as $item)
             <div class="productBox">
                <img id="{{'cart_img'.$item->id}}" src="{{$item->path}}" alt="" width="100%" height="50%">
                <div class="inforProduct">
                    <h3 id="{{'cart_name'.$item->id}}"  class="proDuctName">{{$item->name}}</h3>
                    <h4 id="{{'cart_price'.$item->id}}"  class="pice">{{$item->price}}</h4>
                    <p id="{{'cart_intro'.$item->id}}"  class="introduceProduct">
                        {{$item->introduce}}
                    </p>
                </div>
                <div class="paymethod">
                        <button class="btn btn-danger"  type="submit" onclick="buy()">MUA</button>
                        <button class="btn btn-danger" id="{{$item->id}}" type="submit" onclick="addCart(this.id)">THÊM VÀO GIỎ HÀNG</button>          
                </div>
            </div>
             @endforeach
        </div>
    </div>
    <div class="paginationContai">
        {{$products->links()}}
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset("fontEnd/js/user.js")}}"></script>
@endsection