<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    //created_atの自動更新を無効にする
    const CREATED_AT = NULL;

    protected $fillable = [
        'subscription_id',
        'plan_name',
        'plan_fee',
        'month',
    ];

    public function subscriptions()
    {
        return $this->belongsTo(Subscription::class);
    }
    public function userSubscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }
}
