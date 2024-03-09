<?php

namespace App\Http\Controllers;
use App\Models\Subscription;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function getSubscriptions()
    {
        $subscriptions = Subscription::all();
        return response()->json($subscriptions);
    }

    public function getSubscription($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId);
        return response()->json($subscription);
    }

}
