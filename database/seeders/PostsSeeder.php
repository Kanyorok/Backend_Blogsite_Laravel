<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $faker = \Faker\Factory::create();
     for ($i = 0; $i < 10; $i++) {
         Posts::create([
             'title' => $faker->sentence,
             'content' => $faker->paragraph,
         ]);
     }   
    }
}
