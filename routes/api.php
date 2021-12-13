<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// /*
// |
// |
// |
// |Customer Account Routes
// |
// |
// |
// */
Route::get('users', [UserController::class, 'index']);

Route::post('create-user', [UserController::class, 'create']);

Route::get('users/{id}', [UserController::class, 'show']);

Route::delete('users/{id}', [UserController::class, 'destroy']);


// //Login routes
// Route::prefix('/user')->group(function () {
//     Route::post('/login', [LoginController::class, 'login']);
// });

/*
|
|
|
|Customer Address Routes
|
|
|
*/
//View all Address belonging to a single customer
Route::get('users/{id}/address', [AddressController::class, 'index']);

//Show a single address
Route::get('users/{id}/address/{addressId}', [AddressController::class, 'show']);

//Create an Address
Route::post('users/{id}/create', [AddressController::class, 'create']);

//Delete a single address
Route::delete('users/{id}/address', [AddressController::class, 'destroy']);

//Edit a single address
Route::get('users/{userId}/address', [AddressController::class, 'edit']);

//Update a single address
Route::put('users/{id}/update', [AddressController::class, 'update']);
