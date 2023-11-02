"user strick";
function buy() {
    console.log("hihi");
}
function addCart(clicked_id) {
    const productImg = document.getElementById("cart_img" + clicked_id).src;
    const productName = document.getElementById(
        "cart_name" + clicked_id
    ).textContent;
    const productIntro = document.getElementById(
        "cart_intro" + clicked_id
    ).textContent;
    const productPrice = document.getElementById(
        "cart_price" + clicked_id
    ).textContent;
    if (localStorage.getItem("data") == null) {
        localStorage.setItem("data", `[]`);
    }
    var old_data = JSON.parse(localStorage.getItem("data"));
    var isRepeat = false;
    for (let i = 0; i < old_data.length; i++) {
        if (clicked_id == old_data[i].id) {
            isRepeat = true;
            break;
        }
    }
    if (!isRepeat) {
        const newIteam = {
            id: clicked_id,
            name: productName,
            price: productPrice,
            intro: productIntro,
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
    console.log(data);
    data.forEach((iteam) => {
        text += `<tr>
      <td>${iteam.name}</td>
      <td>${iteam.price}</td>
      <td> <button id="${iteam.id}" class="test" onclick="removeProduc(this.id)">X</button></td>
    </tr>`;
    });
    document.getElementById("list_cart").innerHTML = text;
}
function showCart() {
    hidenPop();
    showSub();
}
document.getElementById("layout").addEventListener("click", function (e) {
    if (
        !document.getElementById("listCartContainer").contains(e.target) &&
        !document.getElementById("cart_icon").contains(e.target)
    ) {
        closePop();
    }
});
function closePop() {
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
