<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;



class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100000; $i++) {
            DB::table('book')->insert([
                'name' => $faker->sentence(3),
                'idCategory' =>  rand(1, 3000),
                'idAuthor' => rand(1, 10),
            ]);
        }
    }
}
