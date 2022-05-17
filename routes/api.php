<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["namespace" => "App\Http\Controllers"], function(){
  Route::post('login', 'UserController@login');
  Route::post('register', 'UserController@register');
  Route::resource('carts', "CartsController")->except("update", "destroy");
  Route::delete('carts', "CartsController@destroy")->name("carts.destroy");
  Route::put('carts', "CartsController@update")->name("carts.update");
  Route::resource('orders', 'OrdersController');
  Route::resource('products','ProductsController');
  Route::resource('carts.products', 'CartProductsController');
});

Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "/admin", "as" => "admin."], function(){
  Route::get("dashboard", "DashboardController@index");
  Route::resource("products", "ProductsController");
  Route::resource("orders", "OrdersController");
  Route::resource("customers", "CustomersController");
});

/*Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::post('/upload-file', 'App\Http\Controllers\ProductController@uploadFile');
Route::get('/products/{product}', 'App\Http\Controllers\ProductController@show');



Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users','App\Http\Controllers\UserController@index');
    Route::get('users/{user}','App\Http\Controllers\UserController@show');
    Route::patch('users/{user}','App\Http\Controllers\UserController@update');
    Route::get('users/{user}/orders','App\Http\Controllers\UserController@showOrders');
    Route::patch('products/{product}/units/add','App\Http\Controllers\ProductController@updateUnits');
    Route::patch('orders/{order}/deliver','App\Http\Controllers\OrderController@deliverOrder');
    Route::resource('/orders', 'App\Http\Controllers\OrderController');
    Route::resource('/products', 'App\Http\Controllers\ProductController')->except(['index','show']);
});
*/
