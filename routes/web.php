<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\BankNameController;
use App\Http\Controllers\AddPointController;
use App\Http\Controllers\MoneyCustomersController;
use App\Http\Controllers\WithdrawMoneyController;
use App\Http\Controllers\BankNameUserController;
use App\Http\Controllers\AllUsersController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/address', [AddressController::class, 'index']);
Route::post('/add-address',[ AddressController::class,'store']);
Route::put('update-address/{id}',[ AddressController::class,'update']);

Route::get('/car_brand', [CarBrandController::class, 'index']);
Route::get('/add-car_brand', [CarBrandController::class, 'create']);
Route::get('/edit-car_brand/{id}', [CarBrandController::class, 'edit']);
Route::post('/add-car_brand_name', [CarBrandController::class, 'store']);
Route::put('update-car_brand_name/{id}',[ CarBrandController::class,'update']);
Route::get('/delete-car_brand/{id}', [CarBrandController::class, 'destroy']);


Route::get('/car_model', [CarModelController::class, 'index']);
Route::get('/add-model_car', [CarModelController::class, 'create']);
Route::post('/add-model_name', [CarModelController::class, 'store']);
Route::get('/edit-model_name/{id}', [CarModelController::class, 'edit']);
Route::put('/update-model_name/{id}', [CarModelController::class, 'update']);
Route::get('/delete-model_name/{id}', [CarModelController::class, 'destroy']);


Route::get('/bank_name', [BankNameController::class, 'index']);
Route::get('/create_bank_name', [BankNameController::class, 'create']);
Route::post('/add-bank_name', [BankNameController::class, 'store']);
Route::get('/delete-bank_name/{id}', [BankNameController::class, 'destroy']);


Route::get('/add_point', [AddPointController::class, 'index']);
Route::get('/create_point', [AddPointController::class, 'create']);
Route::post('/add-point', [AddPointController::class, 'store']);
Route::put('/update-point/{id}', [AddPointController::class, 'update']);

Route::get('/money-customers', [MoneyCustomersController::class, 'index']);
Route::post('/money-customers', [MoneyCustomersController::class, 'index']);
Route::get('/withdraw_money_customers', [WithdrawMoneyController::class, 'index']);
Route::get('/create_withdraw_money', [WithdrawMoneyController::class, 'create']);
Route::post('/add-withdraw_money', [WithdrawMoneyController::class, 'store']);
Route::get('/admin-withdraw_money', [WithdrawMoneyController::class, 'indexAdmin']);
Route::post('/admin-withdraw_money', [WithdrawMoneyController::class, 'indexAdmin']);
Route::put('/update-withdraw_money/{id}', [WithdrawMoneyController::class, 'update']);


Route::get('/bank_name_user', [BankNameUserController::class, 'index']);
Route::post('/add-bank_name_user', [BankNameUserController::class, 'store']);
Route::put('/update-bank_name_user/{id}', [BankNameUserController::class, 'update']);
Route::put('/update-bank_name_user/{id}', [BankNameUserController::class, 'update']);
Route::put('/update-bank_name_user/{id}', [BankNameUserController::class, 'update']);

Route::get('/all-user', [AllUsersController::class, 'index']);
Route::post('/all-user', [AllUsersController::class, 'index']);
Route::put('/update-ststus_point/{id}', [AllUsersController::class, 'update']);
Route::put('/admin-add-ponint-user/{id}', [AllUsersController::class, 'updatePonit']);
Route::get('/bonus', [AllUsersController::class, 'bonus']);
Route::post('/bonus', [AllUsersController::class, 'bonus']);
Route::get('/edit-bonus/{id}', [AllUsersController::class, 'show']);