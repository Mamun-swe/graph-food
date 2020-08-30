<?php

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

// Auth Routes

Route::get('login', 'AuthController@loginView')->name('login');
Route::post('login', 'AuthController@login')->name('login');

Route::get('register', 'AuthController@registerView')->name('register');
Route::post('register', 'AuthController@registration')->name('register');

Route::get('reset', 'AuthController@resetView')->name('reset');
Route::post('reset', 'AuthController@resetPass')->name('reset');

Route::post('logout', 'AuthController@logout')->name('logout');

Route::get('change-password', 'Website\PasswordResetController@index')->name('password.change');
Route::post('change-password-reset', 'Website\PasswordResetController@resetPass')->name('password.change.reset');
Route::post('sendmessage','Website\MailController@sendMessage')->name('sendmessage');

// Admin Panel Routes
Route::get('/home', 'HomeController@index')->name('dashboard')->middleware('auth', 'adminPermission');
Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => ['auth', 'adminPermission']], function(){
    Route::resource('category', 'Admin\CategoryController');
    Route::post('product/{id}/status', 'Admin\ProductController@status')->name('product.status');
    Route::resource('product', 'Admin\ProductController');
    Route::get('orders', 'Admin\OrderController@index')->name('orders');
    Route::get('order/{id}/show/{uid}', 'Admin\OrderController@show')->name('order.show');
    Route::post('order/accept', 'Admin\OrderController@acceptOrder')->name('order.accept');

    // Bangla Item
    Route::post('bangla/{id}/status', 'Admin\BanglaFoodControler@status')->name('bangla.status');
    Route::resource('bangla', 'Admin\BanglaFoodControler');

    Route::resource('banner', 'Admin\BannerController');
    Route::resource('testimonial', 'Admin\TestimonialController');
});

// User Acccount Routes
Route::group(['prefix'=>'account','as'=>'account.', 'middleware' => ['auth', 'userPermission']], function(){
    Route::get('cart', 'Website\CartController@index')->name('cart');
    Route::post('cart', 'Website\CartController@store')->name('cart.store');
    Route::delete('cart/{id}/destroy', 'Website\CartController@destroy')->name('cart.destroy');

    Route::post('cart-quantity-increment', 'Website\CartController@incrementQuantity')->name('cart.quantity.increment');
    Route::post('cart-quantity-decrement', 'Website\CartController@decrementQuantity')->name('cart.quantity.decrement');
    Route::get('checkout', 'Website\CartController@checkOut')->name('cart.checkout');
    Route::post('order', 'Website\CartController@placeOrder')->name('cart.order');

    Route::get('profile', 'Website\AccountController@account')->name('profile');
    Route::post('profile', 'Website\AccountController@updateUser')->name('profile.update');
    Route::get('history', 'Website\AccountController@history')->name('history');
});

// Website Routes
Route::get('/', 'Website\WebsiteController@home')->name('home');
Route::get('/category/{id}', 'Website\WebsiteController@category')->name('category');
Route::get('/service', 'Website\WebsiteController@service')->name('service');
Route::get('/contact', 'Website\WebsiteController@contact')->name('contact');
Route::post('/search', 'Website\WebsiteController@search')->name('search');
Route::get('/bangla-items', 'Website\WebsiteController@banglaItems')->name('bangla');
Route::get('/offer', 'Website\WebsiteController@FlashOffer')->name('offer');

// Page not found
Route::get('/denied', 'Website\WebsiteController@denied')->name('denied');

// Auth::routes(['reset' => false, 'login' => false]);


