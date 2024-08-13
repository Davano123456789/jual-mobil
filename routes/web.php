<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\DashboardController;

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


Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('logout', [AuthController::class, 'logout']);
Route::middleware(['auth', 'onlyadmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('list-car', [DashboardController::class, 'listCar'])->name('dashboard');
    Route::get('list-conditions', [DashboardController::class, 'listConditions'])->name('dashboard');
    Route::get('add-condition', [DashboardController::class, 'addCondition'])->name('dashboard');
    Route::post('add-condition', [DashboardController::class, 'rilAddCondition'])->name('dashboard');
    Route::get('deleteCondition{id}', [DashboardController::class, 'deleteCondition'])->name('dashboard');
    Route::get('listBrands', [DashboardController::class, 'listBrands'])->name('dashboard');
    Route::get('add-brand', [DashboardController::class, 'addBrand'])->name('dashboard');
    Route::post('add-brand', [DashboardController::class, 'rilAddBrand'])->name('dashboard');
    Route::get('deleteBrand/{id}', [DashboardController::class, 'deleteBrand'])->name('dashboard');
    Route::get('deletedBrand/{id}', [DashboardController::class, 'deletedBrand'])->name('dashboard.deletedBrand');
    Route::get('list-images', [DashboardController::class, 'listImages'])->name('dashboard');
    Route::get('addImage', [DashboardController::class, 'addImage'])->name('dashboard');
    Route::get('deleteImage/{id}', [DashboardController::class, 'deleteImage'])->name('dashboard');
    Route::get('addCar', [DashboardController::class, 'addCar'])->name('dashboard');
    Route::post('rilAddCar', [DashboardController::class, 'rilAddCar'])->name('dashboard');
    Route::post('rilAddImage', [DashboardController::class, 'rilAddImage'])->name('dashboard');

});
Route::middleware(['auth', 'onlyclient'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->middleware('auth');
    Route::get('showCarNew', [HomeController::class, 'showCarNew'])->middleware('auth');
    Route::get('showCarNew/search', [HomeController::class, 'showCarNew'])->middleware('auth')->name('carsNew.search');
    Route::get('showCarBekas', [HomeController::class, 'showCarBekas'])->middleware('auth');
    Route::get('showCarBaruBekas', [HomeController::class, 'showCarBaruBekas'])->middleware('auth');
    Route::get('/showAllCar', [HomeController::class, 'showAllCar'])->middleware('auth')->name('cars.showAll');
    Route::get('/showAllCar/search', [HomeController::class, 'showAllCar'])->middleware('auth')->name('cars.search');
    Route::get('showCarBrand/{id}', [HomeController::class, 'showCarBrand'])->middleware('auth');
    Route::get('showCar/{id}', [HomeController::class, 'showCar'])->middleware('auth');
    Route::post('/basket/add/{car_id}', [BasketController::class, 'addToBasket'])->name('basket.add');    
    Route::get('/basketUser', [BasketController::class, 'basketUser'])->name('basketUser');
    Route::get('/buyCar/{id}', [BasketController::class, 'buyCar'])->middleware('auth');
    Route::get('/buyAllCars/{id}', [BasketController::class, 'buyAllCars'])->middleware('auth')->name('buyAllCars');
    Route::get('/deleteCarFromBasket/{basketId}/{carId}', [BasketController::class, 'deleteCarFromBasket'])->name('deleteCarFromBasket');


});

Route::post('/', [AuthController::class, 'login']);