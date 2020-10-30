<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Cors;
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


Route::middleware(Cors::class)->get('/products', 'App\Http\Controllers\ProductsController@show');
Route::middleware('auth:api', Cors::class)->get('authenticated', function () {
        return response(['authenticated' => true,'user'=>Auth::user()]);
    
});

Route::middleware(Cors::class)->get('/token', 'App\Http\Controllers\CSRFController@show');
Route::middleware(Cors::class)->prefix('/user')->group(function () {
    Route::post('orders', function (Request $request) {
        return ($request);
    });
    Route::middleware('auth:api')->delete('logout', 'App\Http\Controllers\Api\v1\LoginController@logout');
    Route::post('login', 'App\Http\Controllers\Api\v1\LoginController@login');
    Route::post('/orders', 'App\Http\Controllers\Api\v1\OrderController@show');
});