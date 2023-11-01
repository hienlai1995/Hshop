@extends('pages.adminpages.admin-index')
@section('comboEdit')
<div id="ad_comboInputContainer" class="ad_comboInputContainer">
    <h1>COMBO EDIT</h1>
    <div class="ad_comboInputContainer_choseContainer">
        <div id="available-products" class="ad_comboAdd_selected-products">
            <h2>Available Products</h2>
            <div class="ad_nameAndPrice" id="ad_name">
                <label for="comboName"> Enter name combo:</label>
                <input type="text" id="comboName" placeholder="enter your combo name..." value="{{$comboEit->name}}">
                <span id="error_combo_name"></span>
            </div>
            <div  class="ad_nameAndPrice" id="ad_price" >
                <label for="comboPrice"> Enter price combo:</label>
                <input type="text" id="comboPrice" placeholder="enter your combo price..." value="{{$comboEit->price}}">
                <span id="error_combo_price"></span>
            </div>           
            <ul id="available-products-list" class="available-products-list">
                @foreach ($listProduct as $l)
                    @foreach($listProductAvailible as $iteam)
                        @if ($l->id==$iteam)
                            <li class="product" style="cursor: pointer" data-product-id="{{ $l->id }}">{{ $l->name }}</li> 
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
        <div id="selected-products" class="ad_comboAdd_selected-products">
            <h2>Selected Products</h2>
            <ul id="selected-products-list" class="selected-products-list">
                @foreach ($listProduct as $l)
                    @foreach($listProductIdSelect as $iteam)
                      @if ($l->id==$iteam)
                      <li class="product" style="cursor: pointer" data-product-id="{{ $l->id }}">{{ $l->name }}</li> 
                      @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
    <div  class="ad_comboAddContai">
        <button id="submit-button" class="btn btn-danger">update</button>
    </div>    
</div>
 <script>
     const updateName = document.querySelector('meta[name="update-name"]').getAttribute('content');
     document.addEventListener('DOMContentLoaded', function () {
     const availableProductsList = document.getElementById('available-products-list');
     const selectedProductsList = document.getElementById('selected-products-list');
     const submitButton = document.getElementById('submit-button');
    availableProductsList.addEventListener('click', function (event) {
        if (event.target.classList.contains('product')) {
            const selectedProduct = event.target.cloneNode(true);
            selectedProductsList.appendChild(selectedProduct);
            event.target.remove();
        }
    });
    selectedProductsList.addEventListener('click', function (event) {
        if (event.target.classList.contains('product')) {
            const availableProduct = event.target.cloneNode(true);
            availableProductsList.appendChild(availableProduct);
            event.target.remove();
        }
    });
    submitButton.addEventListener('click', function () {
        const ad_comboInputContainer = document.getElementById("ad_comboInputContainer")
        const ad_name = document.getElementById("ad_name");
        const ad_price = document.getElementById("ad_price");
        const comboName= document.getElementById("comboName").value;
        const comboPrice = document.getElementById("comboPrice").value;;
        const selectedProductIds = Array.from(selectedProductsList.children).map(product =>parseInt(product.dataset.productId));
        var url = window.location.pathname;
        var parts = url.split('/');
        var id = parts[parts.length - 1]; 
        error_combo_name.textContent = "";
        error_combo_price.textContent = "";
        fetch(updateName, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ selectedProductIds: selectedProductIds,
                comboName:comboName,
                comboPrice :comboPrice,
                id :id
           })
        })
        .then( 
            response => response.json()
            )
        .then(data => {
            var para = document.createElement("p");
            para.textContent =data.message;
            para.id="ad_comboAddMess";
            para.classList.add("ad_comboAddMess");
            ad_comboInputContainer.appendChild(para);
            if(document.getElementById("ad_comboAddMess")){
                setTimeout(() => {
                document.getElementById("ad_comboAddMess").remove();
            }, 1000);
            }
            if(data.emptyName) {
               error_combo_name.textContent="không được để trống trường này...";
            }
            if(data.isPrice) {
                error_combo_price.textContent="giá combo phải là một số và không được để trống...";
            }
        })
        .catch(error => {
             var para = document.createElement("p");
            para.textContent =error.message;
            para.id="ad_comboAddMess";
            para.classList.add("ad_comboAddMess");
            ad_comboInputContainer.appendChild(para);
            if(document.getElementById("ad_comboAddMess")){
                setTimeout(() => {
                document.getElementById("ad_comboAddMess").remove();
            }, 1000);
            }
        });
    });
});
 </script>
@endsection