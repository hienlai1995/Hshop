<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("fontEnd/css/wellcome.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/home.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/headerLogin.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/login.css")}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hshop</title>
</head>
<body id="layout">
    @yield('header')
    <main class="content">
        @yield('content')
    </main>
    <footer class="footerContainer">
        <div class="footercontent">
            <div class="topFooter">
                <div class="topFooterUp">
                    <div class="topFooterUpbox">
                        <div class="topFooterUp--title">CHĂM SÓC KHÁCH HÀNG</div>
                        <ul class="topFooterUp--ulcontainer">
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Trung Tâm Trợ Giúp</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Shopee Blog</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Shopee Mall</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Hướng Dẫn Bán Hàng</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Hướng Dẫn Mua Hàng</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Thanh Toán</a> </li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Shopee Xu</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Vận Chuyển</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Trả Hàng & Hoàn Tiền</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Chăm Sóc Khách Hàng</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Chính Sách Bảo Hành</a></li>
                        </ul>
                    </div>
                    <div class="topFooterUpbox">
                        <div class="topFooterUp--title">VỀ SHOPEE</div>
                        <ul class="topFooterUp--ulcontainer">
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Giới Thiệu Về Shopee Việt Nam</a> </li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Tuyển Dụng</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Điều Khoản Shopee</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Chính Sách Bảo Mật</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Chính Hãng</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Kênh Người Bán</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Flash Sales</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Chương Trình Tiếp Thị Liên Kết Shopee</a></li>
                            <li class="linksuport"> <a class="removedefaulink footerLinkstyle" href="#">Liên Hệ Với Truyền Thông</a></li>
                        </ul>
                    </div>
                    <div class="topFooterUpbox">
                        <div class="topFooterUp--title">THANH TOÁN</div>
                        <ul class="topFooterUpboxSub">
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/d4bbea4570b93bfd5fc652ca82a262a8" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/a0a9062ebe19b45c1ae0506f16af5c16" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/38fd98e55806c3b2e4535c4e4a6c4c08" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/bc2a874caeee705449c164be385b796c" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/2c46b83d84111ddc32cfd3b5995d9281" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/5e3f0bee86058637ff23cfdf2e14ca09" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/9263fa8c83628f5deff55e2a90758b06" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/0217f1d345587aa0a300e69e2195c492" alt="logo"></a></li>
                        </ul>
                        <div class="topFooterUp--title">ĐƠN VỊ VẬN CHUYỂN</div>
                        <ul class="topFooterUpboxSub">
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/vn-50009109-159200e3e365de418aae52b840f24185" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/d10b0ec09f0322f9201a4f3daf378ed2" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/77bf96a871418fbc21cc63dd39fb5f15" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/59270fb2f3fbb7cbc92fca3877edde3f" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/957f4eec32b963115f952835c779cd2c" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/0d349e22ca8d4337d11c9b134cf9fe63" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/3900aefbf52b1c180ba66e5ec91190e5" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/6e3be504f08f88a15a28a9a447d94d3d" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/b8348201b4611fc3315b82765d35fc63" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/0b3014da32de48c03340a4e4154328f6" alt="logo"></a></li>
                            <li class="payAndTran"><a class="removedefaulink footerLinkstyle" target="_blank" rel="noopener noreferrer" class="venLogo"><img src="https://down-vn.img.susercontent.com/file/vn-50009109-ec3ae587db6309b791b78eb8af6793fd" alt="logo"></a></li>
                        </ul>
                    </div>
                    <div class="topFooterUpbox">
                        <div class="topFooterUp--title">THEO DÕI CHÚNG TÔI TRÊN</div>
                        <ul class="folowus">
                            <li class="folowus--link"><a class="removedefaulink footerLinkstyle" href="" class="folowus--li--link"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                            <li class="folowus--link"><a class="removedefaulink footerLinkstyle" href="" class="folowus--li--link"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                            <li class="folowus--link"><a class="removedefaulink footerLinkstyle" href="" class="folowus--li--link"><i class="fa-brands fa-linkedin"></i> LinkedIn</a></li>
                        </ul>
                    </div>
                    <div class="topFooterUpbox">
                        <div class="topFooterUp--title">TẢI ỨNG DỤNG SHOPEE NGAY THÔI</div>
                        <div class="qrcodeApp">
                            <a href="https://shopee.vn/web" target="_blank" rel="noopener noreferrer"><img src="https://down-vn.img.susercontent.com/file/a5e589e8e118e937dc660f224b9a1472" alt="download_qr_code" class="qrimage"></a>
                            <div class="storeApp">
                                <a href="https://shopee.vn/web" target="_blank" rel="noopener noreferrer" class="storeAppLink"><img src="https://down-vn.img.susercontent.com/file/ad01628e90ddf248076685f73497c163" alt="app"></a>
                                <a href="https://shopee.vn/web" target="_blank" rel="noopener noreferrer" class="storeAppLink"><img src="https://down-vn.img.susercontent.com/file/ae7dced05f7243d0f3171f786e123def" alt="app"></a>
                                <a href="https://shopee.vn/web" target="_blank" rel="noopener noreferrer" class="storeAppLink"><img src="https://down-vn.img.susercontent.com/file/35352374f39bdd03b25e7b83542b2cb0" alt="app"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="topFooterDown">
                    <div class="topFooterDown--subleft">© 2023 Shopee. Tất cả các quyền được bảo lưu.</div>
                    <div class="topFooterDown--subright">
                        <div class="topFooterDown--subright--title">Quốc gia & Khu vực:
                        </div>
                        <ul class="countryAria">
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Singapore</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Indonesia</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Đài Loan</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Thái Lan</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Malaysia</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Việt Nam</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Philippines</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Brazil</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">México</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Colombia</a></li>
                            <li class="countryAria--li"><a class="removedefaulink footerLinkstyle" href="#" class="countryAria--li--link">Chile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="botFooter">
                <ul class="certificationAndrule">
                    <li class="rule"><a href="#" class="footerLinkstyle removedefaulink">CHÍNH SÁCH BẢO MẬT</a></li>
                    <li class="rule"><a href="#" class="footerLinkstyle removedefaulink">QUY CHẾ HOẠT ĐỘNG</a></li>
                    <li class="rule"><a href="#" class="footerLinkstyle removedefaulink">CHÍNH SÁCH VẬN CHUYỂN</a></li>
                    <li class="rule"><a href="#" class="footerLinkstyle removedefaulink">CHÍNH SÁCH TRẢ HÀNG VÀ HOÀN TIỀN</a> </li>
                </ul>
                <div class="certificationAndrule">
                    <a class="removedefaulink certificationlink " href="#">
                        <img src="http://online.gov.vn/Content/EndUser/LogoCCDVSaleNoti/logoCCDV.png" class="imageGridDetailLogo" width="100px" height="50px">
                    </a>
                    <a class="removedefaulink certificationlink" href="#">
                        <img src="http://online.gov.vn/Content/EndUser/LogoCCDVSaleNoti/logoCCDV.png" class="imageGridDetailLogo" width="100px" height="50px">
                    </a>
                </div>
                <div class="companyname">Công ty TNHH Shopee</div>
                <div class="companyinfor">
                    <p class="companyinfor--sub">Địa chỉ: Tầng 4-5-6, Tòa nhà Capital Place, số 29 đường Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam. Tổng đài hỗ trợ: 19001221 - Email: cskh@hotro.shopee.vn</p>
                    <p class="companyinfor--sub">Chịu Trách Nhiệm Quản Lý Nội Dung: Nguyễn Đức Trí - Điện thoại liên hệ: 024 73081221 (ext 4678)</p>
                    <p class="companyinfor--sub">Mã số doanh nghiệp: 0106773786 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 10/02/2015</p>
                    <p class="companyinfor--sub">© 2015 - Bản quyền thuộc về Công ty TNHH Shopee</p>
                </div>
            </div>
        </div>
    </footer>
</body>
