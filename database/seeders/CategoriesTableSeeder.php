<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'category'=> 'Música'],
            ['id' => 2, 'category' => 'Tecnología' ],
            ['id' => 3, 'category' => 'Videojueegos' ],
        ]);
    }
}
