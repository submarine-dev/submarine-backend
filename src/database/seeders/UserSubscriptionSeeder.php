<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('user_subscriptions')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'plan_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'plan_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'plan_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'plan_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'user_id' => 2,
                'plan_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'user_id' => 3,
                'plan_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
