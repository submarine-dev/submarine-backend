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

Route::get('/hello', [HelloController::class, 'index']);

Route::get('/createSubscriptions', [SubscriptionController::class, 'createSubscription']);
Route::post('/subscriptions', [SubscriptionController::class, 'storeSubscription']);

Route::get('/subscriptions', [SubscriptionController::class, 'getSubscriptions']);
Route::get('/subscriptions/{subscriptionId}', [SubscriptionController::class, 'getSubscription']);

Route::delete('/subscriptions/{subscriptionId}', [SubscriptionController::class, 'deleteSubscription']);
