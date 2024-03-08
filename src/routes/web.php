<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\SubscriptionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);

Route::get('/getSubscriptions', [SubscriptionController::class, 'getSubscriptions']);
Route::get('/getSubscriptions/{subscriptionId}', [SubscriptionController::class, 'getSubscription']);
