<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagProductController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AjaxLoginController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\TagPostController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about-us', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/category/{cat}-{slug}', [HomeController::class, 'category'])->name('home.category');
Route::post('/category/{cat}-{slug}', [HomeController::class, 'sortProducts'])->name('home.sortProducts');
Route::get('/product/{product}-{slug}', [HomeController::class, 'product'])->name('home.product');
Route::get('/favorite/{product}', [HomeController::class, 'favorite'])->name('home.favorite');
Route::get('/tag/{tag}', [HomeController::class, 'tag'])->name('home.tag');
Route::get('/category_post/{catp}', [HomeController::class, 'category_post'])->name('home.category_post');
Route::get('/post/{post}', [HomeController::class, 'post'])->name('home.post');
// Route::get('/sort-products', [HomeController::class, 'sortProducts'])->name('home.sortProducts');
// Route::post('/sort-products', [HomeController::class, 'sortProducts'])->name('home.sortProducts');




Route::get('/ajax-search-product',[HomeController::class,'ajaxSearch'])->name('ajax-search-product');

Route::group(['prefix'=> 'account'],function(){
    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::get('/verify-account/{emai}', [AccountController::class, 'verify'])->name('account.verify');
    Route::post('/login', [AccountController::class, 'check_login']);


    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::get('/favorite', [AccountController::class, 'favorite'])->name('account.favorite');
    Route::post('/register', [AccountController::class, 'check_register']);
    
    Route::group(['middleware'=>'customer'], function(){ 
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::post('/profile', [AccountController::class, 'check_profile']);

        
        Route::get('/change-password', [AccountController::class, 'change_password'])->name('account.change_password');
        Route::post('/change-password', [AccountController::class, 'check_change_password']);
    });
        

    Route::get('/forgot-password', [AccountController::class, 'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password', [AccountController::class, 'check_forgot_password']);

    
    Route::get('/reset-password/{token}', [AccountController::class, 'reset_password'])->name('account.reset_password');
    Route::post('/reset-password/{token}', [AccountController::class, 'check_reset_password']);
});


Route::group(['prefix'=>'cart','middleware'=>'customer'], function(){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
Route::group(['prefix'=>'order','middleware'=>'customer'], function(){
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
    Route::get('/history', [CheckoutController::class, 'history'])->name('order.history');
    Route::get('/detail/{order}', [CheckoutController::class, 'detail'])->name('order.detail');
    Route::post('/checkout', [CheckoutController::class, 'post_checkout']);
    Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('order.verify');;
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){ 
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/searchproducts', [ProductController::class, 'searchproducts'])->name('product.searchproducts');
    Route::post('/searchproducts', [ProductController::class, 'searchproducts'])->name('product.searchproducts');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/detail/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/order/update-status/{order}', [OrderController::class, 'update'])->name('order.update');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('tag_product', TagProductController::class);
    Route::resource('post', PostController::class);
    Route::resource('tag_post', TagPostController::class);
    Route::resource('category_post', CategoryPostController::class);
    Route::get('product-delete-image/{image}',[ProductController::class,'destroyImage'])->name('product.destroyImage');
});



Route::group(['prefix'=> 'ajax'],function(){
    Route::post('/login', [AjaxLoginController::class, 'login'])->name('ajax.login');
    Route::get('/logout', [AjaxLoginController::class, 'logout'])->name('ajax.logout');
    Route::post('/comment/{post_id}', [AjaxLoginController::class, 'comment'])->name('ajax.comment');
});