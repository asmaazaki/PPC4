<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::updateOrCreate([
            'email' => 'admin@admin.com',
        ],[
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123'
        ]);

        $user->addRole('super_admin');
    }
}