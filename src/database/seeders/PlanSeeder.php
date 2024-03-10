<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('plans')->insert([
            [
                'id' => 1,
                'subscription_id' => 1,
                'plan_name' => 'Basic',
                'plan_fee' => 800,
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'subscription_id' => 2,
                'plan_name' => 'Prime Video',
                'plan_fee' => 500,
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'subscription_id' => 3,
                'plan_name' => 'Spotify',
                'plan_fee' => 980,
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'subscription_id' => 4,
                'plan_name' => 'Disney+',
                'plan_fee' => 700,
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'subscription_id' => 5,
                'plan_name' => 'Standard',
                'plan_fee' => 1200,
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'subscription_id' => 6,
                'plan_name' => 'Prime Video',
                'plan_fee' => 500,
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'subscription_id' => 7,
                'plan_name' => 'Spotify',
                'plan_fee' => 980,
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'subscription_id' => 8,
                'plan_name' => 'Disney+',
                'plan_fee' => 700,
                'updated_at' => now()
            ],
        ]);
    }
}
