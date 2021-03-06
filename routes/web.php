<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

//Route::get('/', [OrderController::class, 'index'])->name('home');
Route::get('/order', [OrderController::class, 'index']);
Route::resource('dish',App\Http\Controllers\DishController::class);

Auth::routes([
    'register'=>false,
    'confirm'=>false,
    'reset'=>false,
]);
