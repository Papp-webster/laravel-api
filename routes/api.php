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

Route::get('/users', [UsersController::class, 'show']);



// Protected routes
Route::group(['middleware' => ['api_token']], function () {
   Route::get('/users/{token}/{q}', [UsersController::class, 'users']);
   Route::get('/users/publish/{token}/{q}', [UsersController::class, 'index'])->name('publisher');
});