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
    /**
     * ユーザーのサブスクリプションを取得
     */
    public function getUserSubscriptions($userId)
    {
        $user = User::find($userId);
        $userSubscriptions = $user->userSubscriptions()->with('subscription', 'plan')->get();
        return response()->json($userSubscriptions);
    }

    //ユーザーサブスクリプションの登録

    public function createUserSubscription($userId)
    {
        $user = User::find($userId);
        return view('createusersubscriptionform', ['user' => $user]);
    }

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
