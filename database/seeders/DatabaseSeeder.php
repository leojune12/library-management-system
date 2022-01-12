<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();

        User::create([
            'name' => "Administrator",
            'email' => "admin@test.com",
            'email_verified_at' => now(),
            'password' => Hash::make("pw@12345"),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        $this->call([
            UserSeeder::class,
            BookSeeder::class,
        ]);
    }
}
