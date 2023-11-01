@extends('pages.adminpages.admin-index')
@section('addProduct')
<div class="addProductContainer">
    <h1>ADD PRODUCT</h1>
<form action="{{ route('products.store') }}" method="POST" class="ad_addform">
    @csrf
    <div class="inputData">
        <h3  >product name:</h3>
        <input type="text" id="name" name="name"  placeholder="input produc name..." class="ad_addinputtag" value="{{old("name")}}">
        @error('name')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="inputData">
        <h3  >path:</h3>
        <input type="text" id="path" name="path"  placeholder="input product img path..." class="ad_addinputtag" value="{{old("path")}}">
        @error('path')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="inputData">
        <h3 >introduce:</h3>
        <input type="text" id="introduce" name="introduce"  placeholder="Enter product description..." class="ad_addinputtag" value="{{old("introduce")}}">
        <div style="color: red"> 
            @error('introduce')
            <p class="">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="inputData">
        <h3 >price:</h3>
        <input type="text" id="price" name="price"  placeholder="Enter product price..." class="ad_addinputtag" value="{{old("price")}}">
        @error('price')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="ad_addinputtag ad_formaddmtn">Add Product</button>
</form>
</div>

@endsection