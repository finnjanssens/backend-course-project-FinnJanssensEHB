<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\Item_instanceController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('auth/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'middleware' => 'is_admin',
    ], function () {
        Route::get('/admin', [ItemController::class, "allData"])
            ->name('admin');
        Route::get('/item/{id}', [Item_instanceController::class, "getItemInstances"]);
        Route::post('/item/{id}', [Item_instanceController::class, "updateItemInstance"]);
    });

    Route::get('/dashboard', [LoanController::class, "getUserLoansAndReservations"])
        ->name('dashboard');
    Route::post('/reserve', [ReserveController::class, "reserve"]);
});

require __DIR__ . '/auth.php';
