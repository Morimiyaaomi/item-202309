<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
Route::get('/items/search', [App\Http\Controllers\ItemController::class, 'search']);
Route::get('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
Route::post('/items/add', [App\Http\Controllers\ItemController::class, 'add']);

Route::post('/cart/add', [App\Http\Controllers\ItemController::class, 'cartadd']);
Route::get('/cart/show', [App\Http\Controllers\ItemController::class, 'cartshow']);
Route::delete('/cart/delete/{id}', [App\Http\Controllers\ItemController::class, 'cartdelete']); //--URLへ削除ID埋め込み--
// 商品一覧からの削除
Route::post('item/destroy/{id}', [App\Http\Controllers\ItemController::class, 'itemdestroy'])->name('item.destroy');