<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentalController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/genres',[GenreController::class,'index']);
Route::get('/movies',[MovieController::class,'index']);
Route::delete('/movies/delete/{movie}',[MovieController::class,'destroy']);
Route::post('/movies',[MovieController::class,'store']);
Route::put('/movies/{movie}',[MovieController::class,'update']);

Route::get('/memberships',[MembershipController::class,'index']);

Route::get('/customers',[CustomerController::class,'index']);
Route::delete('/customers/delete/{customer}',[CustomerController::class,'destroy']);
Route::post('/customers',[CustomerController::class,'store']);
Route::put('/customers/{customer}',[CustomerController::class,'update']);

Route::get('/rentals',[RentalController::class,'index']);
Route::post('/rentals',[RentalController::class,'store']);
Route::delete('/rentals/delete/{rental}',[RentalController::class,'destroy']);
Route::put('/rentals/{rental}',[RentalController::class,'update']);
