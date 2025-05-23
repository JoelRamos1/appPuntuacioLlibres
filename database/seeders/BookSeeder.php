<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Cien años de soledad',
                'author' => 'Gabriel García Márquez',
                'summary' => 'Una obra maestra sobre la historia de la familia Buendía en Macondo.',
                'publication_date' => '1967-06-05',
                'price' => 19.99,
                'image' => 'https://m.media-amazon.com/images/I/91TvVQS7loL._SL1500_.jpg',
                'minimal_age' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id' => 8,
            ],
            [
                'title' => 'El señor de los anillos',
                'author' => 'J.R.R. Tolkien',
                'summary' => 'La épica aventura de Frodo para destruir el Anillo Único.',
                'publication_date' => '1954-07-29',
                'price' => 25.50,
                'image' => 'https://www.marcialpons.es/media/img/portadas/9788445009598.jpg',
                'minimal_age' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'category_id' => 4,
            ],
        ]);
    }
}
