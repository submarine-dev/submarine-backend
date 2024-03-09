<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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







    //検証用
    public function createUser(){
        return view('createuserform');
    }
    public function storeUser(Request $request){
        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
        ]);
        return response()->json($user);
    }
}
