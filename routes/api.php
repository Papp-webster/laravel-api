<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;


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

// Public routes


Route::post('users/login', [AuthController::class, 'login']);

Route::get('/users', [UsersController::class, 'show']);



// Protected routes
Route::group(['middleware' => ['api_token']], function () {
   Route::get('/users/publisher/{id}/{api_token}', [UsersController::class, 'publisherUsers']);
   Route::get('/users/search/{q}/{api_token}', [UsersController::class, 'search']);
   Route::get('/publisher/{id}/{api_token}', [UsersController::class, 'index'])->name('publisher');
});