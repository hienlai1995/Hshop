"use strick";
document.getElementById("ad_avarta").addEventListener("click", function () {
    document.getElementById("ad_logout").classList.toggle("disble");
});
document.getElementById("ad_bodytag").addEventListener("click", function (e) {
    if (
        !document.getElementById("ad_logout").contains(e.target) &&
        !document.getElementById("ad_avarta").contains(e.target)
    ) {
        document.getElementById("ad_logout").classList.add("disble");
    }
});

if (document.getElementById("alert-success")) {
    setTimeout(function () {
        document.getElementById("alert-success").style.display = "none";
    }, 2000);
}
