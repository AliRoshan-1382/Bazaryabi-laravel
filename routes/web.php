<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/', [AdminController::class, 'login'])->name(''); // داشبورد 
Route::post('/login', [AdminController::class, 'AuthLogin'])->name('login'); // لاگین
Route::get('/logout', [AdminController::class, 'logout']); // لاگ اوت کردن ادمن
Route::get('Admin/dashboard', [AdminController::class, 'Dashboard']); // داشبورد




