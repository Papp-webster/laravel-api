<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


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

//Route::post('api/register', [AuthController::class, 'register']);
//Route::post('api/login', [AuthController::class, 'login']);
Route::get('/users', [UsersController::class, 'index']);
//Route::post('api/users/{id}', [ProductController::class, 'show']);
Route::get('/users/search/{q}', [UsersController::class, 'search']);

