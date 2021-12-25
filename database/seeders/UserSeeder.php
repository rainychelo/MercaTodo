<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'=>'Marcelo De la Hoz',
            'email'=>'admin@test.com',
            'email_verified_at' => now(),
            'password'=>Hash::make(12345678)
        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
