<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin hesabı
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
            ]
        );

        // Firma hesabı
        User::updateOrCreate(
            ['email' => 'firma@example.com'],
            [
                'name' => 'Firma 1',
                'password' => bcrypt('123456789'),
                'role' => 'company',
            ]
        );
    }
}
