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
        $section = [
            '4'
        ];

        foreach (range(1, 12) as $index) {
            Provinces::create([
                'user_id' => 4,
                'province_number' => $faker->unique()->numberBetween(1, 12),
                'province_name' => $faker->randomElement($arabicNames),
                'section_id' => $faker->randomElement($section),
            ]);
        }
    }
}
