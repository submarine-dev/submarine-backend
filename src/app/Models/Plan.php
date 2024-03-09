<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    public function subscriptions()
    {
        return $this->belongsTo(Subscription::class);
    }
    public function userSubscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }
}
