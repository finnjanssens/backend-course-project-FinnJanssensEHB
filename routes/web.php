<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\Item_instanceController;
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

Route::get('/dashboard', [ItemController::class, "allData"])->middleware(['auth'])->name('dashboard');

Route::get('/item/{id}', [Item_instanceController::class, "getItemInstances"])->middleware(['auth']);

Route::post('/item/{id}', [Item_instanceController::class, "updateItemInstance"])->middleware(['auth']);

require __DIR__ . '/auth.php';
