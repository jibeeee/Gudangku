<?php

use App\Http\Controllers\ServiceController;
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
    return redirect('/home');
});
Route::get('/service/checkin', function () {
    return view('services.checkIn');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/service/inventory', [ServiceController::class, 'index_inventory'])->name('service.inventory');
    Route::get('/service/supplier', [ServiceController::class, 'supplier'])->name('service.supplier');
    Route::resource('/service', ServiceController::class)->middleware('auth');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




