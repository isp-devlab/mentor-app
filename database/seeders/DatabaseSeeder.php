<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mentor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('mentors')->insert([
            'id' => '43b06c63-c6b4-4a02-8fcf-beab2bf723fb',
            // 'role_id' => '43b06c63-c6b4-4a02-8fcf-beab2bf723fa',
            'name' => 'Fajar',
            'phone_number' => '0895611024559',
            'email' => 'fajarrivaldi2015@gmail.com',
            'password' => Hash::make('password'),
            'image' => null,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
