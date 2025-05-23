<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.es',
            'password' => Hash::make('admin1234'),
            'birthday_date' => '1980/01/01'
        ]);

        User::factory()->create([
            'name' => 'Joel',
            'email' => 'joel@gmail.com',
            'password' => Hash::make('Abcd@1235'),
            'birthday_date' => '2006/04/14'
        ]);

        User::factory()->create([
            'name' => 'Dani',
            'email' => 'dani@gmail.com',
            'password' => Hash::make('Abcd@1235'),
            'birthday_date' => '2013/01/29'
        ]);
        
        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
