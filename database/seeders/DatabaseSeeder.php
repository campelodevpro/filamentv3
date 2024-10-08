<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'leo',
            'email' => 'leo@test.com.br',
            'password'=> Hash::make('1234'),
            'is_admin'=> true,
        ]);

        User::factory(99999)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com'
        // ]);
    }
}
