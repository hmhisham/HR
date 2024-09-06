<?php

namespace Database\Seeders;

use App\Models\Workers\Workers;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Import the Faker library

class WorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create an instance of Faker

        $arabicNames = ['أحمد', 'محمد', 'علي', 'فاطمة', 'عائشة', 'خديجة']; // Example Arabic names
        $departments = ['إدارة الموارد البشرية', 'التسويق', 'المالية', 'التكنولوجيا']; // Example departments

        for ($i = 0; $i < 10; $i++) {
            Workers::create([
                'user_id' => $faker->randomNumber(),
                'calculator_number' => $faker->randomNumber(),
                'full_name' => $faker->randomElement($arabicNames),
                'employee_id_number' => substr($faker->numerify('ID-####'), 0, 20),
                'department' => $faker->randomElement($departments),
            ]);
        }
    }
}
