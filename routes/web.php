<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;
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
Route::get('/service/create', function () {
    return view('supplier.create');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/service/inventory', [ServiceController::class, 'index_inventory'])->name('service.inventory');
    Route::resource('/supplier', SupplierController::class)->middleware('auth');
    Route::resource('/service', ServiceController::class)->middleware('auth');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




