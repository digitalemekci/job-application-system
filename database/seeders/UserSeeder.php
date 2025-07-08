<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
{
    $firma = \App\Models\Firma::create([
        'name' => 'Firma 1',
    ]);
    \App\Models\User::updateOrCreate(
        ['email' => 'firma@example.com'],
        [
            'name' => 'Firma 1',
            'password' => bcrypt('123456789'),
            'role' => 'company',
            'firma_id' => $firma->id,
        ]
        );

    \App\Models\User::updateOrCreate(
        ['email' => 'firma_hr@example.com'],
        [
            'name' => 'Firma İK',
            'password' => bcrypt('123456789'),
            'role' => 'hr',
            'firma_id' => $firma->id,
        ]
    );

    \App\Models\User::updateOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Admin',
            'password' => bcrypt('123456789'),
            'role' => 'admin',
        ]
    );
}
}
