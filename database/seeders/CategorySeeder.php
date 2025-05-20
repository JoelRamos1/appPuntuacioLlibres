<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nom' => 'Realista'],
            ['nom' => 'Ciencia Ficción'],
            ['nom' => 'Intriga'],
            ['nom' => 'Fantasía'],
            ['nom' => 'Romance'],
            ['nom' => 'Ensayo'],
            ['nom' => 'Acción'],
            ['nom' => 'Poetica'],
            ['nom' => 'Terror']
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['nom'],
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);
        }
    }
}
