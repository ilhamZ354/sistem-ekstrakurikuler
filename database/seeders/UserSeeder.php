<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'username' => '1234',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
            'level' => 'admin',
            'lastSeen' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
