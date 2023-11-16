<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("fontEnd/css/adminHeader.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/adminindex.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/adminleftbar.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/adminproduct.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/adminAdd.css")}}" />
    <link rel="stylesheet" href="{{asset("fontEnd/css/adminAddCombo.css")}}" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="route-name" content="{{ route('combo.listcombossend') }}">
    <meta name="update-name" content="{{ route('combo.updateCombo') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admincontrol</title>
</head>
<body id="ad_bodytag">
    @include("pages.adminpages.includes.admin-header")
    <main class="mainTag">
        @include("pages.adminpages.includes.admin-leftbar")
        @yield('product')
        @yield('addProduct')
        @yield('editProduct')
        @yield('search')
        @yield('combos')
        @yield('comboAdd')
        @yield('comboEdit')
        @yield('detailCombo')
        @yield('order')
        @yield('orderdetail')
    </main>
    <script src="{{asset("fontEnd/js/admin.js")}}"></script>
</body>
</html>
