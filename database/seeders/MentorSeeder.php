<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::where('name', 'Admin')->first();
        Mentor::create([
            'role_id' => $roleAdmin->id,
            'name' => 'Fajar',
            'phone_number' => '0895611024559',
            'email' => 'fajarrivaldi2015@gmail.com',
            'password' => Hash::make('password'),
            'image' => null,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $roleMentor = Role::where('name', 'Mentor')->first();
        Mentor::create([
            'role_id' => $roleMentor->id,
            'name' => 'Sukma',
            'phone_number' => '085161102423',
            'email' => 'sukma@gmail.com',
            'password' => Hash::make('password'),
            'image' => null,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
