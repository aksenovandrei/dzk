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

Route::get('/', 'IndexController@index');
Route::get('/buyCertificate', 'IndexController@showCertificateOrderForm')->name('showCertificateOrderForm');
Route::get('/buyJump', 'IndexController@showJumpOrderForm')->name('showJumpOrderForm');

Route::post('/buyCertificate', 'PaymentController@makePayment')->name('makePayment');

//Route::post('/activation', 'ActivateController@index')->name('activation');
//Route::post('/activation/book', 'ActivateController@bookJump')->name('bookJump');
//Route::get('/activation', function (){
//    return view('front.activation');
//});

//Route::post('/activation', 'ActivateController@check');
Route::resource('/activation', 'ActivateController');
Route::post('/activation/form', 'ActivateController@showBookingForm')->name('yyy');

//AUTH
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'adminIndex']);
    Route::resource('/certificates', 'CertificatesController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/customers', 'CustomerController');
    Route::resource('/days', 'DayController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');
Route::post('/buyCertificate/callback', 'PaymentController@callbackFromYandex');
