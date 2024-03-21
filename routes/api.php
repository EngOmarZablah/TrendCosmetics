<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('/get_catagories', [CatagoriesController::class, 'getCatagories']);

Route::get('/get_ads', [AdsController::class, 'getAds']);

Route::get('/get_profile_details/{id}', [ProfileController::class, 'getProfileDetails']);

Route::get('/get_products/{subCatagoryId}', [ProductsController::class, 'getProducts']);

Route::get('/get_addresses', [AddressController::class, 'getAddresses'])->middleware("auth:api");
Route::post('/add_address', [AddressController::class, 'addAddress'])->middleware("auth:api");

Route::post('/add_order', [OrderController::class, 'addOrder'])->middleware("auth:api");

Route::get('/get_regions', [RegionController::class, 'getRegions'])->middleware("auth:api");
Route::get('/get_cities/{region_id}', [RegionController::class, 'getCities'])->middleware("auth:api");
Route::get('/get_townships/{city_id}', [RegionController::class, 'getTownships'])->middleware("auth:api");