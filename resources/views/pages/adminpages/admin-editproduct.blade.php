@extends('pages.adminpages.admin-index')
@section('editProduct')
<div class="addProductContainer">
    <h1>EDIT PRODUCT</h1>
<form action="{{ route('products.update',['id'=>$product->id]) }}" method="POST" class="ad_addform">
    @csrf
    @method('PUT')
    <div class="inputData">
        <h3  >product name:</h3>
        <input type="text" id="name" name="name" class="ad_addinputtag" value="{{$product->name}}">
        @error('name')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="inputData">
        <h3  >path:</h3>
        <input type="text" id="path" name="path" class="ad_addinputtag" value="{{$product->path}}">
        @error('path')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <div class="inputData">
        <h3 >introduce:</h3>
        <input type="text" id="introduce" name="introduce" class="ad_addinputtag" value="{{$product->introduce}}">
        <div style="color: red"> 
            @error('introduce')
            <p class="">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="inputData">
        <h3 >price:</h3>
        <input type="text" id="price" name="price" class="ad_addinputtag" value="{{$product->price}}">
        @error('price')
        <p style="color: red">{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="ad_addinputtag ad_formaddmtn"> UPDATE</button>
</form>
</div>

@endsection