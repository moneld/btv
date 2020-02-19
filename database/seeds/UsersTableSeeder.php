<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        \App\User::create([
            'nom' => 'LOCAL',
            'prenom' => 'Admin',
            'email' => 'admin@local.com',
            'date_naissance' => now(),
            'role' =>'admin',
            'default_password_change' =>true,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        //User
        \App\User::create([
            'nom' => 'LOCAL',
            'prenom' => 'User',
            'email' => 'user@local.com',
            'email_verified_at' => now(),
            'date_naissance' => now(),
            'service_id' => '1',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
