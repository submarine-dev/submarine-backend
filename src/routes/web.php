<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserSubscriptionController;
use Illuminate\Support\Facades\Route;

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

//検証用のROUTE
Route::get('/createUser', [UserSubscriptionController::class, 'createUser']);
Route::post('/users', [UserSubscriptionController::class, 'storeUser']);
