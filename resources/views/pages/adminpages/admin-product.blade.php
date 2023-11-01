@extends('pages.adminpages.admin-index')
<style>
    .table>:not(caption)>*>*{
        border: 1px solid gray;
    }
</style>
@section('product')
    
   <div class="tableProduct">
    <div class="addContent">
        <div class="addtitle">
            <H1>LISTS PRODUCT</H1>
               
           @if (Session::has('success'))
               <div id="alert-success" class="alert alert-success">{{Session::get("success")}}</div>
           @endif
        </div>
        <div class="add_bnt">
            <a href="{{URL::to("/admin/add-product")}}" class="add_bnt-link">+ ADD PRODUCTS</a>
        </div>
    </div>
    <div class="tableContainer">
        <table border="1"class="table" >
            <thead >
                <tr class="theadTileContainer">
                    <th class="theadTile" >STT</th>
                    <th class="theadTile">PRODUCT NAME</th>
                    <th class="theadTile">PRICE</th>
                    <th class="theadTile">PATH</th>
                    <th class="theadTile">INTRODUCE</th>
                    <th class="theadTile">FUNCTIONS</th>    
                </tr>
            </thead>
            <tbody> 
                @foreach ($products as $item)
                <tr class="theadTileContainer" >
                    <td class="theadTile">{{$i+=1}}</td>
                    <td class="theadTile">{{$item->name}}</td>
                    <td class="theadTile">{{$item->price}}</td>
                    <td style="max-width: 500px"   class="theadTile">{{$item->path}}</td>
                    <td style="max-width: 500px "  class="theadTile">{{$item->introduce}}</td>
                    <td class="ad_editAndDel">
                        <form action="{{route('products.edit',$item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <a href="{{route('products.edit',$item->id)}}" class="ad_editAndDel--link btn btn-primary" ><i class="fa-solid fa-pen"></i></a>  
                        </form> 
                        <form method="POST" action="{{ route('products.destroy', ['id' => $item->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                        </form>      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginationContai">
        {{$products->links()}}
    </div>
   </div>
@endsection