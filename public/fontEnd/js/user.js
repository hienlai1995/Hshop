"user strick";
function buy() {
    console.log("hihi");
}
function checkProductInCart(id, old_data) {
    var isRepeat = false;
    for (let i = 0; i < old_data.length; i++) {
        if (id == old_data[i].id) {
            isRepeat = true;
            break;
        }
    }
    return isRepeat;
}
function totalPrice() {
    let totalMoney = 0;
    const old_data = JSON.parse(localStorage.getItem("data"));
    for (let i = 0; i < old_data.length; i++) {
        totalMoney +=
            parseInt(old_data[i].price) * parseInt(old_data[i].quantity);
    }
    document.getElementById("totalPrice").textContent =
        "TỔNG :" + totalMoney + " Vnd";
}
function addCart(clicked_id) {
    const productName = document.getElementById(
        "cart_name" + clicked_id
    ).textContent;
    const productIntro = document.getElementById(
        "cart_intro" + clicked_id
    ).textContent;
    const productPrice = document.getElementById(
        "cart_price" + clicked_id
    ).textContent;
    const quantity = document.getElementById(
        "quantity-text" + clicked_id
    ).textContent;
    if (localStorage.getItem("data") == null) {
        localStorage.setItem("data", `[]`);
    }

    const old_data = JSON.parse(localStorage.getItem("data"));
    if (!checkProductInCart(clicked_id, old_data)) {
        const newIteam = {
            id: clicked_id,
            name: productName,
            price: productPrice,
            intro: productIntro,
            quantity: quantity,
        };
        old_data.push(newIteam);
        localStorage.setItem("data", JSON.stringify(old_data));
    } else {
        alert("sản phẩm đã có trong giỏ hàng");
    }
}
function hidenPop() {
    document
        .getElementById("listCartContainer")
        .classList.toggle("cart_disble");
}
function showSub() {
    //xóa phần cũ
    let text = "";
    // lấy dữ liêu
    const data = JSON.parse(localStorage.getItem("data"));
    data.forEach((iteam) => {
        text += `<tr>
      <td class ="namePro${iteam.id}" >${iteam.name}</td>
      <td class ="pricePro${iteam.id}">${iteam.price}</td>
      <td>
        <button class="minus-btn1 minus-btn"  data-info1="${iteam.id}"  onclick="reduceNumber(this,'quantitycart-textjs','data-info1')">-</button>
        <span class="quantity-text" id="quantitycart-textjs${iteam.id}">${iteam.quantity}</span>
        <button class="plus-btn"  data-info2="${iteam.id}"   onclick="increasingNumber(this,'quantitycart-textjs','data-info2')">+</button>
      </td> 
      <td> <button id="${iteam.id}" class="test" onclick="removeProduc(this.id)">X</button></td>
    </tr>`;
    });
    document.getElementById("list_cart").innerHTML = text;
}
function showCart() {
    hidenPop();
    showSub();
    totalPrice();
}
$(document).mouseup(function (e) {
    var container = $("#listCartContainer, #cart_icon");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        closePop();
    }
});
function closePop() {
    const arrId = document.getElementsByClassName("minus-btn1");
    let old_data = JSON.parse(localStorage.getItem("data"));
    for (let i = 0; i < old_data.length; i++) {
        for (let j = 0; j < arrId.length; j++) {
            if (old_data[i].id == arrId[j].getAttribute("data-info1")) {
                old_data[i].quantity = document.getElementById(
                    `quantitycart-textjs${arrId[j].getAttribute("data-info1")}`
                ).textContent;
            }
        }
    }
    localStorage.setItem("data", JSON.stringify(old_data));
    document.getElementById("listCartContainer").classList.add("cart_disble");
}
function removeProduc(clicked_id) {
    const old_data = JSON.parse(localStorage.getItem("data"));
    let iteamToRemove;
    old_data.forEach((iteam) => {
        if (clicked_id == iteam.id) {
            return (iteamToRemove = iteam);
        }
    });
    const new_data = old_data.filter(function (item) {
        return item !== iteamToRemove;
    });
    localStorage.setItem("data", JSON.stringify(new_data));
    showSub();
}
function saveQuantityAfterChange(quantity, id) {
    const old_data = JSON.parse(localStorage.getItem("data"));
    if (old_data.length > 0) {
        for (let i = 0; i < old_data.length; i++) {
            if (id == old_data[i].id) {
                old_data[i].quantity = quantity;
            }
        }
    }
    localStorage.setItem("data", JSON.stringify(old_data));
}
function isInCart(id) {
    const old_data = JSON.parse(localStorage.getItem("data"));
    let isIn = false;
    if (old_data.length > 0) {
        for (let i = 0; i < old_data.length; i++) {
            if (old_data[i].id == id) {
                isIn = true;
                break;
            }
        }
    } else {
        isIn = false;
    }
    return isIn;
}
function reduceNumber(button, quantityText, dataInfo) {
    const tailId = button.getAttribute(dataInfo);
    
    if (isInCart(tailId) == true) {
        const displayNumber = document.getElementById(quantityText + tailId);
        let quantity = parseInt(displayNumber.textContent);
        if (quantity > 1) {
            quantity--;
            displayNumber.textContent = quantity;
            document.getElementById(`quantity-text` + tailId).textContent =
                quantity;
        }
        saveQuantityAfterChange(displayNumber.textContent, tailId);
        totalPrice();
    } else {
        const displayNumber = document.getElementById(quantityText + tailId);
        let quantity = parseInt(displayNumber.textContent);
        if (quantity > 1) {
            quantity--;
            displayNumber.textContent = quantity;
        }
    }
}
function increasingNumber(button, quantityText, dataInfo) {
    const tailId = button.getAttribute(dataInfo);
    if (isInCart(tailId) == true) {
        const displayNumber = document.getElementById(quantityText + tailId);
        let quantity = parseInt(displayNumber.textContent);
        quantity++;
        displayNumber.textContent = quantity;
        document.getElementById(`quantity-text` + tailId).textContent =
            quantity;
        saveQuantityAfterChange(displayNumber.textContent, tailId);
        totalPrice();
    } else {
        const displayNumber = document.getElementById(quantityText + tailId);
        let quantity = parseInt(displayNumber.textContent);
        quantity++;
        displayNumber.textContent = quantity;
    }
}
function onload() {
    const old_data = JSON.parse(localStorage.getItem("data"));
    if (old_data == null) {
        localStorage.setItem("data", JSON.stringify([]));
    } else {
        const data = JSON.parse(localStorage.getItem("data"));
        if (data.length > 0) {
            for (let i = 0; i < data.length; i++) {
                if (document.getElementById("quantity-text" + data[i].id)) {
                    document.getElementById(
                        "quantity-text" + data[i].id
                    ).textContent = data[i].quantity;
                }
            }
        }
    }
}
function reSetQuantyti() {
    const listQuantity = document.getElementsByClassName("quantity-text");
    for (let i = 0; i < listQuantity.length; i++) {
        listQuantity[i].textContent = 1;
    }
}

function sendData() {
    let dataToSend = [];
    const listProductInfor = document.getElementsByClassName("minus-btn1");
    for (let i = 0; i < listProductInfor.length; i++) {
        // lấy id và số lượng của sản phẩm
        const newIteam = {
            id: listProductInfor[i].getAttribute("data-info1"),
            quantity: parseInt(
                document.getElementById(
                    `quantitycart-textjs${listProductInfor[i].getAttribute(
                        "data-info1"
                    )}`
                ).textContent
            ),
        };
        dataToSend.push(newIteam);
    }
    if (dataToSend.length > 0) {
        // đẩy lên server
        const cartRoute = document
            .querySelector('meta[name="cartRoute"]')
            .getAttribute("content");
        fetch(cartRoute, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({ data: dataToSend }),
        })
            .then((response) => response.json())
            .then((data) => {
                // show thông báo thành công hoặc thất bại
                console.log(data);
                if (data.success == true) {
                    document
                        .getElementById("messageCart")
                        .classList.remove("cart_disble");
                    document
                        .getElementById("messageCart")
                        .classList.add("messageCart");
                    document.getElementById(
                        "messageCart"
                    ).innerHTML = `<p>${data.message}</p>`;
                    // clear localStorage
                    localStorage.setItem("data", JSON.stringify([]));
                    showCart();
                    reSetQuantyti();
                }
                if (data.success == false) {
                    document
                        .getElementById("messageCart")
                        .classList.remove("cart_disble");
                    document
                        .getElementById("messageCart")
                        .classList.add("messageCart");
                    document.getElementById(
                        "messageCart"
                    ).innerHTML = `<p>${data.message}</p>`;
                    showCart();
                }
                setTimeout(function () {
                    document
                        .getElementById("messageCart")
                        .classList.add("cart_disble");
                    document
                        .getElementById("messageCart")
                        .classList.remove("messageCart");
                }, 2000);
            })
            .catch((error) => console.error("Lỗi:", error));
    } else {
        if (document.getElementById("totalPrice")) {
            document.getElementById("totalPrice").textContent =
                "bạn chưa chọn món hàng nào";
        }
    }
}
onload();
