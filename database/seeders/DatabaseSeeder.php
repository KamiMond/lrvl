<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([ResourcesSeeder::class,]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('123'),
            'is_admin' => true,
        ]);
    }
}
