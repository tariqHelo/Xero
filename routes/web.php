<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Dcblogdev\Xero\Models\XeroToken;
use Dcblogdev\Xero\Facades\Xero;
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

Route::group(['middleware' => ['web', 'XeroAuthenticated']], function(){
    Route::get('xero', function(){
        return Xero::contacts()->get();

    });
});

Route::get('xero/connect', function(){
    return Xero::connect();
});
Route::get('users' , [UsersController::class , 'index']);