<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('subscriptions')->insert([
            [
            'id' => '1',
            'subscription_name' => 'Basic',
            'icon' => 'https://www.netflix.com/favicon.ico',
            'updated_at' => now()
            ],
            [
                'id' => '2',
                'subscriptionName' => 'Amazon Prime Video',
                'icon' => 'https://www.primevideo.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'subscriptionName' => 'Spotify',
                'icon' => 'https://www.spotify.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'id' => '4',
                'subscriptionName' => 'Disney+',
                'icon' => 'https://www.disneyplus.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'id' => '5',
                'subscriptionName' => 'Netflix',
                'icon' => 'https://www.netflix.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'id' => '6',
                'subscriptionName' => 'Amazon Prime Video',
                'icon' => 'https://www.primevideo.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'id' => '7',
                'subscriptionName' => 'Spotify',
                'icon' => 'https://www.spotify.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'id' => '8',
                'subscriptionName' => 'Disney+',
                'icon' => 'https://www.disneyplus.com/favicon.ico',
                'updated_at' => now()
            ],
        ]);
    }
}
