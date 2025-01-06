<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Provinces\Provinces;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $arabicNames = [
            'الداودية', 'النجيبية', 'البيبان', 'اراضي الصبخ'
        ];

        foreach (range(1, 1000) as $index) {
            Provinces::create([
                'user_id' => 4,
                'province_number' => $faker->unique()->numberBetween(1, 1000),
                'province_name' => $faker->randomElement($arabicNames),
            ]);
        }
    }
}
