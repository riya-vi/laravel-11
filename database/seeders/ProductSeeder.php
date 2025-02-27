<?php

namespace Database\Seeders;
use Faker\Factory as Faker ;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,15) as $index){
            DB::table('products')->insert([
                'name' => $faker->word,
                'quantity' => $faker->numberBetween(10,100),
                'price' => $faker->numberBetween(500, 8000),
                'description' => $faker->paragraph(2),
            ]);  
        }
    }
}
