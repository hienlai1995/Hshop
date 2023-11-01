@extends('pages.adminpages.admin-index')
@section('combos')

<style>
    .table>:not(caption)>*>*{
        border: 1px solid gray;
    }
</style>    
   <div class="tableProduct">
    <div class="addContent">
        <div class="addtitle">
            <H1>COMBO</H1>
               
           @if (Session::has('success'))
               <div id="alert-success" class="alert alert-success">{{Session::get("success")}}</div>
           @endif
        </div>
        <div class="add_bnt">
            <a href="{{route('combo.addCombo')}}" class="add_bnt-link">+ ADD COMBO</a>
        </div>
    </div>
    <div class="tableContainer">
        <table border="1"class="table" >
            <thead >
                <tr class="theadTileContainer">
                    <th class="theadTile" >STT</th>
                    <th class="theadTile">COMBO NAME</th>
                    <th class="theadTile">PRICE</th>
                    <th class="theadTile">INTRODUCE</th>
                    <th class="theadTile">FUNCTIONS</th>    
                </tr>
            </thead>
            <tbody> 
                @foreach ($combolist as $item)
                <tr class="theadTileContainer" >
                    <td class="theadTile">{{$i++}}</td>
                    <td class="theadTile">{{$item->name}}</td>
                    <td class="theadTile">{{$item->price}}</td>
                    <td style="max-width: 500px "  class="theadTile">{{$item->introduce}}</td>
                    <td class="ad_editAndDel">  
                        <form method="POST" action="{{route('combo.deleteCombo',$item->id)}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this combo?')" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                        </form> 
                        <form method="POST" action="{{route('combo.editCombo',$item->id)}}">
                            @csrf
                            @method('PUT')
                            <a href="{{route('combo.editCombo',$item->id)}}" class="ad_editAndDel--link btn btn-primary" ><i class="fa-solid fa-pen"></i></a>  
                        </form>  
                        <form method="POST" action="{{route('combo.detail',$item->id)}}" >
                            @csrf
                            <button type="submit"class="btn btn-danger">SHOW</button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginationContai">
        {{$combolist->links()}}
    </div>
@endsection