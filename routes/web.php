<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupporterController;



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
Route::get('/', [AuthController::class, 'login']); // داشبورد 
Route::post('/login', [AuthController::class, 'AuthLogin']); // لاگین
Route::get('/logout', [AuthController::class, 'logout']); // لاگ اوت کردن ادمن

Route::group(['middleware' => 'admin'], function(){
        Route::get('Admin/dashboard', [AdminController::class, 'Dashboard']); // داشبورد
        Route::get('Admin/SupporterForm', [AdminController::class, 'SupporterForm']); // فرم ثبت پشتیبان
        Route::post('Admin/AddSupporter', [AdminController::class, 'AddSupporter']); // ثبت پشتیبان
        Route::get('Admin/supportertable', [AdminController::class, 'supportertable']); //  جدول پشتیبان ها
        Route::get('Admin/shoptable', [AdminController::class, 'shoptable']); //  جدول فروشگاه ها
        Route::post('Admin/updateSupporter', [AdminController::class, 'updateSupporter']); //  آپدیت پشتیبان
        Route::post('Admin/updateShop', [AdminController::class, 'updateShop']); //   آپدیت فروشگاه ها

    ;}
);


Route::group(['middleware' => 'supporter'], function () {
    Route::get('Supporter/dashboard', [SupporterController::class, 'Dashboard']); // داشبورد
    Route::get('Supporter/shopForm', [SupporterController::class, 'shopForm']); // فرم فروشگاه ها
    Route::post('Supporter/shopAdd', [SupporterController::class, 'shopAdd']); // ثبت فروشگاه ها
    Route::get('Supporter/shoptable', [SupporterController::class, 'shoptable']); // جدول فروشگاه ها
    Route::get('Supporter/customerForm', [SupporterController::class, 'customerForm']); // فرم ثبت مشتری
    Route::post('Supporter/customerAdd', [SupporterController::class, 'customerAdd']); // ثبت مشتری
    Route::get('Supporter/customerTable', [SupporterController::class, 'customerTable']); // جدول مشتری
    Route::get('Supporter/reportForm', [SupporterController::class, 'reportForm']); //  فرم ثبت گزارش

    ;}
);






