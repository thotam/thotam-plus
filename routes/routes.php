<?php

use Illuminate\Support\Facades\Route;
use Thotam\ThotamPlus\Http\Controllers\ChiNhanhController;

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

Route::middleware(['web', 'auth', 'CheckAccount', 'CheckHr', 'CheckInfo'])->group(function () {

    //Route Admin
    Route::redirect('admin', '/', 301);
    Route::group(['prefix' => 'admin'], function () {
        Route::get('chinhanh',  [ChiNhanhController::class, 'admin_chinhanh'])->name('admin.chinhanh');
    });
});
