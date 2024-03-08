<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //サブスクリプション作成フォームの表示
    public function createSubscription()
    {
        return view('createSubscriptionform');
    }

    //サブスクリプションマスタの作成
    public function storeSubscription(SubscriptionRequest $request)
    {
        $subscription = new Subscription();
        $subscription->subscription_name = $request->name;
        $subscription->icon = $request->icon;
        $subscription->color = $request->color;
        $subscription->cancel_url = $request->cancel_url;
        $subscription->save();
        return response()->json([
            "message" => "subscription record created"
        ], 201);
    }
}
