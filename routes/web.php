<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Products
Route::get('/Christopher_IT_Accessories', [ProductController::class, 'index'])->name('home');
Route::get('/Christopher_IT_Accessories/product', [ProductController::class, 'showproduct'])->name('product');
Route::get('/Christopher_IT_Accessories/currentorder', [ProductController::class, 'currentOrder'])->name('current');
Route::get('/Christopher_IT_Accessories/orderhistory', [ProductController::class, 'historyOrder'])->name('history');
Route::get('/Christopher_IT_Accessories/cartlist', [ProductController::class, 'cartList'])->name('cart');
Route::get('/Christopher_IT_Accessories/search', [ProductController::class, 'searchProduct'])->name('search');
Route::post('/Christopher_IT_Accessories/search', [ProductController::class, 'searchProduct'])->name('search');
Route::get('/Christopher_IT_Accessories/details/{id}', [ProductController::class, 'details'])->name('detail');
Route::post('/Christopher_IT_Accessories/addtocart/{pid}', [ProductController::class, 'addToCart'])->name('AddToCart');
Route::get('/Christopher_IT_Accessories/decrease/{id}{qty}', [ProductController::class, 'decrease'])->name('desQty');
Route::get('/Christopher_IT_Accessories/increase/{id}{qty}', [ProductController::class, 'increase'])->name('incQty');
Route::get('/Christopher_IT_Accessories/remove/{id}', [ProductController::class, 'remove'])->name('remove');
Route::post('/Christopher_IT_Accessories/checkout/{total}', [ProductController::class, 'checkout'])->name('checkout');
Route::post('/Christopher_IT_Accessories/order', [ProductController::class, 'order'])->name('orderPost');


//Users
Route::get('/Christopher_IT_Accessories/signup', [UserController::class, 'getSignup'])->name('signup');
Route::post('/Christopher_IT_Accessories/signup', [UserController::class, 'postSignup'])->name('signup.post');
Route::get('/Christopher_IT_Accessories/signin', [UserController::class, 'getSignin'])->name('signin');
Route::post('/Christopher_IT_Accessories/signin', [UserController::class, 'postSignin'])->name('signin.post');
Route::get('/Christopher_IT_Accessories/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/Christopher_IT_Accessories/contactus', [UserController::class, 'contactUs'])->name('contactus');
Route::post('/Christopher_IT_Accessories/contactus', [UserController::class, 'saveMessage'])->name('saveMessage');
Route::get('/Christopher_IT_Accessories/about', [UserController::class, 'aboutUs'])->name('aboutUs');

//Admin
Route::get('/Christopher_AdminDashboard', [AdminController::class, 'login'])->name('login');
Route::post('/Christopher_AdminDashboard', [AdminController::class, 'loginPost'])->name('adminLogin');

Route::middleware([Admin::class])->group(function () {
    Route::get('/Christopher_AdminDashboard/product', [AdminController::class, 'showProduct'])->name('adminProduct');
    Route::get('/Christopher_AdminDashboard/edit/{pid}/{detailId}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/Christopher_AdminDashboard/update/{pid}/{detailId}', [AdminController::class, 'save'])->name('save');
    Route::get('/Christopher_AdminDashboard/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/Christopher_AdminDashboard/product/{detailId}', [AdminController::class, 'remove'])->name('admin.remove');
    Route::get('/Christopher_AdminDashboard/newproduct', [AdminController::class, 'addProduct'])->name('newProduct');
    Route::post('/Christopher_AdminDashboard/newproduct', [AdminController::class, 'saveProduct'])->name('saveProduct');
    Route::get('/Christopher_AdminDashboard/addDetail', [AdminController::class, 'addDetail'])->name('addDetail');
    Route::post('/Christopher_AdminDashboard/addDetail', [AdminController::class, 'saveDetail'])->name('saveDetail');
    Route::get('/Christopher_AdminDashboard/orders', [AdminController::class, 'orders'])->name('adminOrder');
    Route::get('/Christopher_AdminDashboard/sales', [AdminController::class, 'sales'])->name('adminSales');
    Route::get('/Christopher_AdminDashboard/orders/{oid}', [AdminController::class, 'statusChange'])->name('change');
    Route::get('/Christopher_AdminDashboard/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/Christopher_AdminDashboard/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/Christopher_AdminDashboard/profile', [AdminController::class, 'profileUpdate'])->name('admin.profileUpdate');
    Route::get('/Christopher_AdminDashboard/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/Christopher_AdminDashboard/userdelete/{userId}', [AdminController::class, 'deleteUser'])->name('deleteuser');
    Route::get('/Christopher_AdminDashboard/contact', [AdminController::class, 'viewMessage'])->name('admin.message');
    Route::get('/Christopher_AdminDashboard/msgdelete/{msgId}', [AdminController::class, 'deleteMessage'])->name('deletemessage');
});