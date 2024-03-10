<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'John Doe',
                'created_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'Jane Doe',
                'created_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'John Smith',
                'created_at' => now()
            ],
        ]);
    }
}
