<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Plan;
use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //dd($request->all());
        try {
            DB::transaction(function () use ($request) {
                $subscription = Subscription::create([
                    'subscription_name' => $request->subscriptionName,
                    'icon' => $request->icon,
                    'color' => $request->color,
                    'cancel_url' => $request->unsubscribeLink,
                ]);

                foreach ($request->plans as $planData) {
                    $plan = new Plan([
                        'plan_name' => $planData['name'],
                        'plan_fee' => $planData['price'],
                    ]);
                    $subscription->plans()->save($plan);
                }
            });  
            $subscriptionData = Subscription::with('plans')->get();
            return response()->json([
                "message" => "subscription record created",
                "subscriptionData" => $subscriptionData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "subscription record not created",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    //全てのサブスクリプションを取得
    public function getSubscriptions()
    {
        $subscriptions = Subscription::with('plans')->get();
        return response()->json($subscriptions);
        // return view('subscriptionlist', ['subscriptions' => $subscriptions]);
    }

    //任意のサブスクリプションを取得
    public function getSubscription($subscriptionId)
    {
        $subscription = Subscription::findOrFail($subscriptionId)->with('plans')->first();
        return response()->json($subscription);
        // return view('editSubscriptionform', ['subscription' => $subscription]);
    }

    //サブスクリプションの削除
    public function deleteSubscription($subscriptionId)
    {
        try {
            DB::transaction(function () use ($subscriptionId) {
                $subscription = Subscription::findOrFail($subscriptionId);
                $subscription->plans()->delete();
                $subscription->delete();
            });
            return response()->json([
                "message" => "subscription record deleted"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "subscription record not deleted",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    //サブスクリプションの更新
    public function updateSubscription(SubscriptionRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                //dd($request->all());
                $subscription = Subscription::findOrFail($request->subscriptionId);
                $subscription->update([
                    'subscription_name' => $request->subscriptionName,
                    'icon' => $request->icon,
                    'color' => $request->color,
                    'cancel_url' => $request->unsubscribeLink,
                ]);
                $subscription->plans()->delete();
                foreach ($request->plans as $planData) {
                    $plan = new Plan([
                        'plan_name' => $planData['name'],
                        'plan_fee' => $planData['price'],
                    ]);
                    $subscription->plans()->save($plan);
                }
            });
            $subscriptionData = Subscription::with('plans')->get();
            return response()->json([
                "message" => "subscription record updated",
                "subscriptionData" => $subscriptionData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "subscription record not updated",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
