<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSubscriptionRequest;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSubscriptionController extends Controller
{
    //
    //ユーザーサブスクリプションの一覧
    public function getUserSubscriptions($userId)
    {
        $user = User::find($userId);
        $userSubscriptions = $user->userSubscriptions()->with('plan')->get();
        // dd($userSubscriptions);
        return response()->json($userSubscriptions, 200);
        // return view('usersubscriptionlist', ['userSubscriptions' => $userSubscriptions]);
    }

    //ユーザーサブスクリプションの登録フォーム
    public function createUserSubscription($userId)
    {
        $user = User::find($userId);
        return view('createusersubscriptionform', ['user' => $user]);
    }
    //ユーザーサブスクリプションの登録
    public function storeUserSubscription(UserSubscriptionRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                UserSubscription::create([
                    'user_id' => $request->user_id,
                    'plan_id' => $request->plan_id,
                    'paid_at' => $request->paid_at,
                ]);
            });
            return response()->json([
                "message" => "user subscription record created",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "user subscription record not created",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    //ユーザーサブスクリプションの取得
    public function getUserSubscription($userId, $userSubscriptionId)
    {
        $user = User::find($userId);
        $userSubscription = $user->userSubscriptions()->with('plan')->where('id', $userSubscriptionId)->first();
        // dd($userSubscription);
        return response()->json($userSubscription, 200);
        // return view('editusersubscription', ['userSubscription' => $userSubscription]);
    }

    //ユーザーサブスクリプションの削除
    public function deleteUserSubscription($userId, $userSubscriptionId)
    {
        try {
            DB::transaction(function () use ($userId, $userSubscriptionId) {
                $user = User::find($userId);
                $user->userSubscriptions()->where('id', $userSubscriptionId)->delete();
            });
            return response()->json([
                "message" => "user subscription record deleted",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "user subscription record not deleted",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    //ユーザーサブスクリプションの更新
    public function updateUserSubscription(UserSubscriptionRequest $request, $userId, $userSubscriptionId)
    {
        // dd($request->all());
        try {
            DB::transaction(function () use ($request, $userId, $userSubscriptionId) {
                $user = User::find($userId);
                $userSubscription = $user->userSubscriptions()->where('id',$userSubscriptionId)->first();
                $userSubscription->update([
                    'plan_id' => $request->plan_id
                ]);
            });
            return response()->json([
                "message" => "user subscription record updated",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "user subscription record not updated",
                "error" => $e->getMessage()
            ], 500);
        }
    }







    //検証用
    public function createUser(){
        return view('createuserform');
    }
    public function storeUser(Request $request){
        // dd($request->all());
        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
        ]);
        dd($user);
        return response()->json($user);
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users);
    }
}
