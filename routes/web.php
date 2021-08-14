<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

////// frontend sections rout
Route::get('/index', [\App\Http\Controllers\Frontend\indexController::class, 'home'])->name('index');
Route::get('/about-us',[\App\Http\Controllers\Frontend\indexController::class, 'aboutUs'])->name('about-us');
Route::get('/contact',[\App\Http\Controllers\Frontend\indexController::class, 'contact'])->name('contact');
Route::get('/product',[\App\Http\Controllers\Frontend\indexController::class, 'product'])->name('product');




Route::get('product-list/{slug}', [\App\Http\Controllers\Frontend\indexController::class, 'productLists'])->name('product.list');

Route::get('product-category/{slug}', [\App\Http\Controllers\Frontend\indexController::class, 'productCategory'])->name('product.category');

Route::get('product.cat/{slug}', [\App\Http\Controllers\Frontend\indexController::class, 'productCat'])->name('product.cat');

Route::get('product.brand/{slug}', [\App\Http\Controllers\Frontend\indexController::class, 'productBrand'])->name('product.brand');


Route::get('product-details/{slug}', [\App\Http\Controllers\Frontend\indexController::class, 'productDetails'])->name('product.details');


// Cart section
Route::get('cart-page','CartController@cartPage')->name('cart-page');
// 
// Route::post('/cartStore','CartController@cartStore')->name('cart.store');

Route::get('/add-to-cart/{id}','CartController@addToCart')->name('add-to-cart');
Route::patch('update-cart','CartController@updateOne')->name('update.cart');

Route::delete('cart-remove','CartController@remove')->name('cart-remove');

Route::get('checkout','CartController@checkout')->name('cart-checkout');
Route::post('/cart','CartController@cartStore')->name('cart.store');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin','verified']], function (){
    Route::get('/admin-admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('adminAdmin');
    // Banner
    Route::resource('banner','BannerController');
    // Route::get('/banner_status', [\App\Http\Controllers\BannerController::class, 'bannerstatus'])->name('banner.status');
    // Category
    Route::resource('category','CagtegoryController');
    // Brand
    Route::resource('brand','BrandController');
    // Product Sections
    Route::resource('product','ProductController');
    Route::get('/product_status', [\App\Http\Controllers\ProductController::class, 'product.status'])->name('banner.status');
    // Product Attributes
    Route::Post('product_attributes/{id}', [\App\Http\Controllers\ProductController::class, 'productAttributes'])->name('product.attributes');
    Route::Post('category/{id}/child', [\App\Http\Controllers\CagtegoryController::class, 'getChildByParentID'])->name('category.status');
    // User Sections
    Route::resource('user','UserController');

    




});


Route::group(['prefix' => 'seller', 'middleware' => ['auth', 'seller','verified']],function(){
    Route::get('/', [\App\Http\Controllers\SellerController::class, 'userDashboard'])->name('userAdmin');
});

//user 
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'user','verified']],function(){
    Route::get('/user-dashboard', [\App\Http\Controllers\user\UdashboardController::class, 'index'])->name('user.home');
    Route::get('/user-home', [\App\Http\Controllers\user\UdashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user-checkout', [\App\Http\Controllers\user\UdashboardController::class, 'checkout'])->name('user.checkout');
    


});


