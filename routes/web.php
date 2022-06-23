<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;

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

Route::get('/',[HelpdeskController::class, 'index']);
Route::get('/add-request',[HelpdeskController::class, 'addRequest']);
Route::post('/store',[HelpdeskController::class,'storeRequest']);

Route::group(['middleware' => 'patikrinti:Darbuotojas'], function () {
    ///Cia visi admino route
    Route::get('/test', 'HomeController@test')->name('test');
});  

Route::group(['middleware' => 'patikrinti:Vartotojas'], function () {
    ///Cia visi vartotojai
    Route::get('/test', 'HomeController@test')->name('test');
});  


Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
