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
    Route::prefix('Admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'Dashboard']); // داشبورد
        Route::get('/SupporterForm', [AdminController::class, 'SupporterForm']); // فرم ثبت پشتیبان
        Route::post('/AddSupporter', [AdminController::class, 'AddSupporter']); // ثبت پشتیبان
        Route::get('/supportertable', [AdminController::class, 'supportertable']); //  جدول پشتیبان ها
        Route::get('/shoptable', [AdminController::class, 'shoptable']); //  جدول فروشگاه ها
        Route::post('/updateSupporter', [AdminController::class, 'updateSupporter']); //  آپدیت پشتیبان
        Route::post('/updateShop', [AdminController::class, 'updateShop']); //   آپدیت فروشگاه ها
        Route::get('/CustomerTable', [AdminController::class, 'CustomerTable']); //   آپدیت فروشگاه ها
        Route::get('/ReportTable', [AdminController::class, 'ReportTable']); //   آپدیت فروشگاه ها
    });
;}
);


Route::group(['middleware' => 'supporter'], function () {
    Route::prefix('Supporter')->group(function () {
        Route::get('/dashboard', [SupporterController::class, 'Dashboard']); // داشبورد
        Route::get('/shopForm', [SupporterController::class, 'shopForm']); // فرم فروشگاه ها
        Route::post('/shopAdd', [SupporterController::class, 'shopAdd']); // ثبت فروشگاه ها
        Route::get('/shoptable', [SupporterController::class, 'shoptable']); // جدول فروشگاه ها
        Route::get('/customerForm', [SupporterController::class, 'customerForm']); // فرم ثبت مشتری
        Route::post('/customerAdd', [SupporterController::class, 'customerAdd']); // ثبت مشتری
        Route::get('/customerTable', [SupporterController::class, 'customerTable']); // جدول مشتری
        Route::post('/shopedit', [SupporterController::class, 'shopedit']); // ادیت فروشگاه
        Route::post('/customeredit', [SupporterController::class, 'customeredit']); // ادیت فروشگاه
        Route::get('/reportForm', [SupporterController::class, 'reportForm']); //  فرم ثبت گزارش
        Route::post('/Addreport', [SupporterController::class, 'Addreport']); //  فرم ثبت گزارش
    });

;}
);






