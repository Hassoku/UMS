<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'haseeb hassan',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ])
    }
}
