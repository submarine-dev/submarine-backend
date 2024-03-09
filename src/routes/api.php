<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserSubscriptionController;
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

//SubscriptionServiceのROUTE
Route::get('/createSubscriptions', [SubscriptionController::class, 'createSubscription']);
Route::post('/subscriptions', [SubscriptionController::class, 'storeSubscription']);

Route::get('/subscriptions', [SubscriptionController::class, 'getSubscriptions']);
Route::get('/subscriptions/{subscriptionId}', [SubscriptionController::class, 'getSubscription']);

Route::delete('/subscriptions/{subscriptionId}', [SubscriptionController::class, 'deleteSubscription']);

Route::put('/subscriptions/{subscriptionId}', [SubscriptionController::class, 'updateSubscription']);


//UserSubscriptionsのROUTE
Route::get('/users/{userId}/subscriptions', [UserSubscriptionController::class, 'getUserSubscriptions']);

Route::get('/users/{userId}/createUserSubscription', [UserSubscriptionController::class, 'createUserSubscription']);
Route::post('/users/{userId}/subscriptions', [UserSubscriptionController::class, 'storeUserSubscription']);

Route::get('/users/{userId}/subscriptions/{userSubscriptionId}', [UserSubscriptionController::class, 'getUserSubscription']);

Route::delete('/users/{userId}/subscriptions/{userSubscriptionId}', [UserSubscriptionController::class, 'deleteUserSubscription']);

Route::put('/users/{userId}/subscriptions/{userSubscriptionId}', [UserSubscriptionController::class, 'updateUserSubscription']);