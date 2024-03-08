<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    //created_atの自動更新を無効にする
    const CREATED_AT = NULL;

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
