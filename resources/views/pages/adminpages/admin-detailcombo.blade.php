@extends('pages.adminpages.admin-index')
@section('detailCombo')
<style>
    .table>:not(caption)>*>*{
        border: 1px solid gray;
    }
</style>    
<div class="tableProduct">
    <h1>combo</h1>
    <div class="tableContainer">
        <table border="1"class="table" >
            
            <thead >
                <tr class="theadTileContainer">
                    <th class="theadTile">COMBO NAME</th>
                    <th class="theadTile">PRICE</th>                   
                </tr>
            </thead>
            <tbody>           
                <tr class="theadTileContainer" >
                    <td class="theadTile">{{$comboShow->name}}</td>
                    <td class="theadTile">{{$comboShow->price}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1>product</h1>
    <div class="tableProduct">   
        <div class="tableContainer">
            <table border="1"class="table" >
                <thead >
                    <tr class="theadTileContainer">
                        
                        <th class="theadTile">PRODUCT NAME</th>
                        <th class="theadTile">PRICE</th>
                        <th class="theadTile">PATH</th>
                        <th class="theadTile">INTRODUCE</th>  
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($productShow as $item)
                    <tr class="theadTileContainer" >
                        
                        <td class="theadTile">{{$item->name}}</td>
                        <td class="theadTile">{{$item->price}}</td>
                        <td style="max-width: 500px"   class="theadTile">{{$item->path}}</td>
                        <td style="max-width: 500px "  class="theadTile">{{$item->introduce}}</td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  

@endsection