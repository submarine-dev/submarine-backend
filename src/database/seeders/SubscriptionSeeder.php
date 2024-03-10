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
                'id' => 1,
            'subscription_name' => 'Basic',
            'icon' => 'https://www.netflix.com/favicon.ico',
            'updated_at' => now()
            ],
            [
                'subscriptionId' => '2',
                'subscriptionName' => 'Amazon Prime Video',
                'icon' => 'https://www.primevideo.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'subscriptionId' => '3',
                'subscriptionName' => 'Spotify',
                'icon' => 'https://www.spotify.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'subscriptionId' => '4',
                'subscriptionName' => 'Disney+',
                'icon' => 'https://www.disneyplus.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'subscriptionId' => '5',
                'subscriptionName' => 'Netflix',
                'icon' => 'https://www.netflix.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'subscriptionId' => '6',
                'subscriptionName' => 'Amazon Prime Video',
                'icon' => 'https://www.primevideo.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'subscriptionId' => '7',
                'subscriptionName' => 'Spotify',
                'icon' => 'https://www.spotify.com/favicon.ico',
                'updated_at' => now()
            ],
            [
                'subscriptionId' => '8',
                'subscriptionName' => 'Disney+',
                'icon' => 'https://www.disneyplus.com/favicon.ico',
                'updated_at' => now()
            ],
        ]);
    }
}
