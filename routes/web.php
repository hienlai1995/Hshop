<?php

use App\Http\Controllers\HomeControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ComboListController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// các router này sẽ được chạy khi trình duyệt gọi url -> tìm đến class controler và gọi các phương thức trong nó
// tiếp tục tìm đến middleware lọc qua các rules của nó lại thay đổi đường dẫn sau đó thực thi phương thức tương
// middleware chỉ thay đổi đường dẫn url còn việc thực thi vẫn là các router này;
// 
// 
Route::get('/', [HomeControler::class, 'index'])->name('index');
Route::get('/login', [HomeControler::class, 'login'])->name("login");
Route::get('/logout', [Admincontroller::class, 'logout'])->name("logout");
Route::post('/admin', [HomeControler::class, 'store'])->name("admin");



Route::middleware(['checkRole:user'])->name('user.')->group(function () {
    // Các routes dành cho người dùng
    Route::get('/user', [UserController::class, 'index'])->name('index');
});
Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin', [HomeControler::class, 'admin'])->name('ohyeah');
    // Các routes dành cho quản trị viên
    Route::prefix('admin')->name('products.')->group(function () {
        Route::get('/add-product', [Admincontroller::class, 'create'])->name("create");
        Route::post('/admin/add-product', [Admincontroller::class, 'store'])->name("store");
        // sửa
        Route::get('/edit-product/{id}', [Admincontroller::class, 'edit'])->name('edit');
        Route::put('/edit-product/{id}', [Admincontroller::class, 'update'])->name("update");
        // xóa
        Route::delete('/{id}',  [Admincontroller::class, 'destroy'])->name('destroy');
        // tìm kiếm
        Route::get('/search',  [Admincontroller::class, 'search'])->name('search');
    });
    Route::prefix('admin')->name('combo.')->group(function () {
        //create route of combo list here
        Route::get('/combo-getcombo', [ComboListController::class, 'index'])->name("listcombos");
        Route::post('/combos-post', [ComboListController::class, 'handlePostRequestForAddCombo'])->name("listcombossend");
        Route::get('/combos/add', [ComboListController::class, 'create'])->name("addCombo");
        Route::get('/combos/edit/{id}', [ComboListController::class, 'edit'])->name("editCombo");
        Route::put('/combos/update', [ComboListController::class, 'update'])->name("updateCombo");
        Route::delete('/combos/delete{id}', [ComboListController::class, 'destroy'])->name("deleteCombo");
        Route::POST('/combos/detail{id}', [ComboListController::class, 'show'])->name("detail");
    });
});
