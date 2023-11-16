<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Http\Requests\registerUserPostRequest;
use App\Http\Requests\registerAdminPostRequest;
use App\Http\Requests\loginUserPostRequests;
use App\Services\UserService;
use App\Services\AdminService;
use Illuminate\Support\Facades\Cookie;

class HomeControler extends Controller
{
    protected  $userService;
    protected  $adminrService;

    public function __construct(UserService $userService, AdminService $adminrService)
    {
        $this->userService = $userService;
        $this->adminrService = $adminrService;
    }
    public function index()
    {
        $products = Products::paginate(8);
        return view('pages.userpages.home', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function getloginUser()
    {
        return view('pages.homepages.loginuser');
    }
    public function getloginAdmin()
    {
        return view('pages.homepages.loginAdmin');
    }
    public function postloginUser(loginUserPostRequests $request)
    {
        $dataLoginClient = $request->input();
        if (Auth::guard('user')->attempt(["email" => $dataLoginClient["email"], "password" => $dataLoginClient["password"]])) {
            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            }

            Auth::guard('user')->attempt(["email" => $dataLoginClient["email"], "password" => $dataLoginClient["password"]]);

            return to_route('user.index');
        }

        return redirect()->route("getloginUser")->withErrors(["email" => "username không đúng ,vui lòng kiểm tra lại", "password" => "password không đúng vui lòng kiểm tra lại"]);
    }
    public function postloginAdmin(loginUserPostRequests $request)
    {
        $dataLoginClient = $request->input();
        if (Auth::guard('admin')->attempt(["email" => $dataLoginClient["email"], "password" => $dataLoginClient["password"]])) {
            if (Auth::guard('user')->check()) {
                Auth::guard('user')->logout();
            }
            Auth::guard('admin')->attempt(["email" => $dataLoginClient["email"], "password" => $dataLoginClient["password"]]);
            return to_route('ohyeah');
        }
        return redirect()->route("getloginAdmin")->withErrors(["email" => "username không đúng ,vui lòng kiểm tra lại", "password" => "password không đúng vui lòng kiểm tra lại"]);
    }
    public function admin()
    {
        $products = Products::paginate(5);
        return view('pages.adminpages.admin-product', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function getRegisterUser()
    {

        return view('pages.homepages.registerUser');
    }
    public function getRegisterAdmin()
    {

        return view('pages.homepages.registerAdmin');
    }
    public function postRegisterAdmin(registerAdminPostRequest $request)
    {
        $request->validated();
        // Kiểm tra xem dữ liệu đã được xác thực hay không
        if ($request->validated()) {
            // Dữ liệu đã được xác thực
            $this->adminrService->addAdmin($request->validated());
            // Thực hiện các tác vụ khi dữ liệu hợp lệ , thông báo tạo tài khoản thành công chuyển tới trang đăng nhập
        }
    }
    public function postRegisterUser(registerUserPostRequest $request)
    {
        $request->validated();
        // Kiểm tra xem dữ liệu đã được xác thực hay không
        if ($request->validated()) {
            // Dữ liệu đã được xác thực
            $this->userService->addUser($request->validated());
            // Thực hiện các tác vụ khi dữ liệu hợp lệ , thông báo tạo tài khoản thành công chuyển tới trang đăng nhập
            session()->flash('addUserComplete', 'thêm người dùng thành công! bạn sẽ được chuyển về trang đăng nhập');
            return to_route('getloginUser');
        }
    }
}
