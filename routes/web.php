<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;

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
Route::get('admin_dashboard',[dashboardController::class,'adminDashboard']);
// Store routes
Route::get('store_list',[dashboardController::class,'storeList']);
Route::get('store_add',[dashboardController::class,'storeAdd']);
Route::post('store_save',[dashboardController::class,'storeSave']);
Route::get('store_edit/{id}',[dashboardController::class,'storeEdit']);
Route::post('store_update',[dashboardController::class,'storeUpdate']);
Route::get('delete_store/{id}',[dashboardController::class,'deleteStore']);

// Product routes
Route::get('pos',[dashboardController::class,'pos']);
Route::get('search_product',[dashboardController::class,'searchProduct']);
Route::get('product_list',[dashboardController::class,'productList']);
Route::get('product_add',[dashboardController::class,'productAdd']);
Route::post('product_store',[dashboardController::class,'productStore']);
Route::get('product_edit/{id}',[dashboardController::class,'productEdit']);
Route::post('product_update',[dashboardController::class,'productUpdate']);
Route::get('product_import',[dashboardController::class,'productImport']);
Route::post('product_import_process',[dashboardController::class,'productImportProcess']);
Route::get('product_export', [dashboardController::class, 'productsExport']);
Route::get('/product_pdf', [dashboardController::class, 'exportToPDF']);

// Category routes
Route::get('category_list',[dashboardController::class,'categoryList']);
Route::post('category_store',[dashboardController::class,'categoryStore']);
Route::get('category_add',[dashboardController::class,'categoryAdd']);
Route::get('category_edit/{id}',[dashboardController::class,'categoryEdit']);
Route::post('category_update',[dashboardController::class,'categoryUpdate']);

// User routes
Route::get('user_list',[dashboardController::class,'userList']);
Route::get('user_add',[dashboardController::class,'userAdd']);
Route::post('user_store',[dashboardController::class,'user_Store']);
Route::get('customer_list',[dashboardController::class,'customerList']);
Route::get('customer_add',[dashboardController::class,'customerAdd']);
Route::post('customer_store',[dashboardController::class,'customerStore']);

Route::get('process_payment',[dashboardController::class,'processPayment']);
Route::get('daily_report',[dashboardController::class,'dailyReport']);
Route::get('monthly_report',[dashboardController::class,'monthlyReport']);
Route::get('sales_report',[dashboardController::class,'salesReport']);
Route::get('sale_report_details',[dashboardController::class,'salesReportDetail']);
Route::get('settings',[dashboardController::class,'settings']);
Route::post('update_settings',[dashboardController::class,'updateSettings']);

Route::get('logout',[dashboardController::class,'logout']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
