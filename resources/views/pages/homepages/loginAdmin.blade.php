@extends('layout')
@section('header')
    @include('pages.userpages.includes.headerLogin')
   <div  class="logincontainer">
        <div class="loginbox" style="background-image: url(&quot;https://down-vn.img.susercontent.com/file/sg-11134004-7rbl1-llop4bp9djo0e4&quot;); ">
            <div class="loginboxiteam">
                        <form action="{{URL::to("/loginAdmin")}}" method="post">
                           <div class="form">
                                <h2>ADMIN Login</h2>
                                 <div class="headform">
                                    <div class="K1dDgL">Đăng nhập</div>
                                    <div class="NYkwiO">
                                        <div class="_6ELZeI">Đăng nhập với mã QR</div>
                                        <a class="_7nvtMo" href="/buyer/login/qr?next=https%3A%2F%2Fshopee.vn%2F">
                                            <svg width="40" height="40" fill="none" class="sYzQJQ">
                                                <g clip-path="url(#clip0)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0H0v18h18V0zM3 15V3h12v12H3zM18 22H0v18h18V22zm-3 15H3V25h12v12zM40 0H22v18h18V0zm-3 15H25V3h12v12z" fill="#EE4D2D"></path>
                                                    <path d="M37 37H22.5v3H40V22.5h-3V37z" fill="#EE4D2D"></path>
                                                    <path d="M27.5 32v-8h-3v8h3zM33.5 32v-8h-3v8h3zM6 6h6v6H6zM6 28h6v6H6zM28 6h6v6h-6z" fill="#EE4D2D">
                                                        </path><path fill="#fff" d="M-4.3 4l44 43.9-22.8 22.7-43.9-44z"></path>
                                                    </g><defs><clipPath id="clip0">
                                                        <path fill="#fff" d="M0 0h40v40H0z"></path>
                                                    </clipPath>
                                                     </defs>
                                            </svg>
                                        </a>
                                    </div>
                                  </div>  
                            <div class="inputform">
                              <div class="userinputcontai">
                                <div class="inputbnt">
                                    <input class="taginput" type="text" placeholder="Email/Số điện thoại/Tên đăng nhập" autocomplete="on" name="email" maxlength="128" aria-invalid="false" value="{{old("loginKey")}}">
                                </div>
                                   <div class="errovailidate"> 
                                    @error('email')
                                        <p class="errmes">{{$message}}</p>
                                    @enderror
                                </div>  
                              </div>
                                <div class="passinputcontai">
                                <div class="inputbnt">
                                        <input class="taginput" type="password" placeholder="Mật khẩu" autocomplete="current-password" name="password" maxlength="16" aria-invalid="false" value="{{old("password")}}">
                                    </div>
                                    
                                    <div class="errovailidate"> 
                                        @error('password')
                                        <p class="errmes">{{$message}}</p>
    
                                        @enderror
                                    </div>
                                    
                                </div>
                                <button class="login_bnt">Đăng nhập</button>
                                <div class="type_login">
                                    <a class="type_login--link" href="/buyer/reset">Quên mật khẩu</a>
                                    <a class="type_login--link type_login--linksub" href="/buyer/login/otp?next=https%3A%2F%2Fshopee.vn%2F">Đăng nhập với SMS</a>
                                </div>
                                <div class="_6yKazv">
                                    <div class="orchose">
                                        <div class="light"></div>
                                        <span class="or">hoặc</span>
                                        <div class="light"></div>
                                    </div>
                                        <div class="ggandfacelogin">
                                            <button class="bnt_gg">
                                                <div class="Bq4Bra">
                                                    <i class="fa-brands fa-facebook gg"></i>   
                                                </div>
                                                <div class="">Facebook</div>
                                            </button>
                                            <button class="bnt_gg">
                                                <div class="Bq4Bra">
                                                    <i class="fa-brands fa-google gg"></i>
                                                </div>
                                                <div class="">Google</div>
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="youknow">
                                        <div class="textyouknow">Bạn mới biết đến Shopee? <a class="youknow_link" href="/buyer/signup?next=https%3A%2F%2Fshopee.vn%2F">Đăng ký</a> </div>             
                                    </div>
                            </div>
                            @csrf
                        </form>
             </div>
         </div>
      </div>
    </div>
@endsection