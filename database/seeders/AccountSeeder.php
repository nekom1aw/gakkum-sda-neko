<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([

            [
                'nama' => 'Super Admin',
                'email' => 'superadmin@gakkum-sda.id',

                'password' => Hash::make('superadmin123'),
                'password_text' => 'superadmin123',

                'role' => 'super_admin',
                'status' => 'Y',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Admin',
                'email' => 'admin@gakkum-sda.id',

                'password' => Hash::make('admin123'),
                'password_text' => 'admin123',

                'role' => 'admin',
                'status' => 'Y',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}