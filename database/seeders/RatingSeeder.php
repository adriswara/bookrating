<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;



class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $total = 500000;
        $batchSize = 1000; // Adjust batch size if needed

        for ($i = 0; $i < $total; $i += $batchSize) {
            $data = [];

            for ($j = 0; $j < $batchSize; $j++) {
                $data[] = [
                    'rating' => rand(1, 10),
                    'idAuthor' => rand(1, 1000),
                    'idBookCategory' => rand(1, 3000),
                    'idBook' => rand(1, 100000),
                ];
            }

            DB::table('your_table_name')->insert($data);
            echo "Inserted batch: " . ($i + $batchSize) . "\n";
        }
    }
}
