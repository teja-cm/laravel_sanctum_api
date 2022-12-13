<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\BankingController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UserStoreProductController;
use App\Http\Controllers\TaskStoreStatusController;
use App\Http\Controllers\BankingStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//users

Route::post('/users',[UsersController::class,'store']);
//tasks
Route::resource('tasks',TasksController::class);

//stores
 //get stores for the specified task
Route::get('stores_tasks/{task_id}',[StoresController::class,'getStores']);
Route::resource('stores',StoresController::class);


//Products
Route::resource('products',ProductsController::class);
Route::get('/products_list',[ProductsController::class,'index']);

//Payments
Route::resource('payments',PaymentsController::class);

//Task_store_Status
Route::resource('Task_Store_Status',TaskStoreStatusController::class);
Route::get('User_Task_Store_Status/{user_id}',[TaskStoreStatusController::class,'getTaskStoreStatus']);

//userstoreproduct
Route::resource('userstoreproduct',UserStoreProductController::class);
Route::get('/userstoreproduct/{user_id}/{store_id}',[UserStoreProductController::class,'index']);

//Banking
Route::resource('banking',BankingController::class);


//BankingStatuses
Route::resource('bankingstatus',BankingStatusController::class);
Route::get('getbankingstatus/{user_id}',[BankingStatusController::class,'getBankingStatus']);
