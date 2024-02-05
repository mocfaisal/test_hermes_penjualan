<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'type' => 1,
                'password' => Hash::make('admin'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'type' => 2,
                'password' => Hash::make('user'),
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
