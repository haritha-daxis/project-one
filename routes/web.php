<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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
//Route::get('/get/{id}',[teachercontroller::class,'getTeacher']);
// use App\Http\Controllers\TestController;
// Route::get('get-list', [TestController::class, 'index_one']);
Route::get('product', [TestController::class,'index']);
Route::post('store-product', [TestController::class,'store']);
Route::post('edit-product', [TestController::class,'edit']);
Route::post('delete-product', [TestController::class,'destroy']);
/////*****Customer CRUD**********/////
use App\Http\Controllers\CustomerController;
Route::get('customer', [CustomerController::class,'index']);
Route::post('store-customer', [CustomerController::class,'store']);
Route::post('edit-customer', [CustomerController::class,'edit']);
Route::post('delete-customer', [CustomerController::class,'destroy']);
/////*****SALES CRUD**********/////
use App\Http\Controllers\SalesController;
Route::get('sales', [SalesController::class,'index']);
Route::post('store-sales', [SalesController::class,'store']);
Route::post('edit-sales', [SalesController::class,'edit']);
Route::post('delete-sales', [SalesController::class,'destroy']);
/////*****Category CRUD**********/////
use App\Http\Controllers\CategoryController;
Route::get('category', [CategoryController::class,'index']);
Route::post('store-category', [CategoryController::class,'store']);
Route::post('edit-category', [CategoryController::class,'edit']);
Route::post('delete-category', [CategoryController::class,'destroy']);
//Route::get('sales', [TestController::class,'salesReport']);
/////*****Reports on Sales**********/////
use App\Http\Controllers\ReportController;
Route::get('report', [ReportController::class,'index']);

Route::get('sales-report', [ReportController::class,'salesReport']);
Route::get('sale-count', [ReportController::class,'saleCount']);
Route::get('no-sale', [ReportController::class,'noSaleCust']);
Route::get('product-count', [ReportController::class,'productCount']);
// use App\Http\Controllers\CustomerController;
Route::resource('customers', CustomerController::class);
// use App\Http\Controllers\SalesController;
// Route::get('/sale', [SalesController::class, 'index']);
// Route::resource('sales', SalesController::class);
// use App\Http\Controllers\GroceryController;
// Route::get('grocery',[GroceryController::class,'index']);
// Route::post('grocery',[GroceryController::class,'store']);
// Route::get('/dd',[GroceryController::class,'show']);
