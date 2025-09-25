<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FilamentAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin JDIH',
            'username' => 'admin',
            'email' => 'adi@univpancasila.ac.id',
            'password' => Hash::make('rahasia'),
            'role' => 'administrator',
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin user created: adi@univpancasila.ac.id / rahasia');
    }
}