<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RealitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $uniquePropertyNumbers = [];

        while (count($uniquePropertyNumbers) < 10) {
            $propertyNumber = $faker->unique()->numerify('PROP-#####');
            $uniquePropertyNumbers[] = $propertyNumber;
        }

        foreach ($uniquePropertyNumbers as $propertyNumber) {
            foreach (range(1, 5) as $province_id) {
                foreach (range(1, 10) as $plot_id) {
                    DB::table('realities')->insert([
                        'user_id' => 4,  // تعيين رقم المستخدم إلى 4
                        'province_id' => $province_id,  // تعيين رقم المقاطعة
                        'plot_id' => $plot_id,  // تعيين رقم القطعة
                        'property_number' => $propertyNumber,
                        'area_in_meters' => $faker->randomFloat(2, 50, 500),
                        'area_in_olok' => $faker->randomFloat(2, 1, 10),
                        'area_in_donum' => $faker->randomFloat(2, 1, 5),
                        'count' => $faker->randomDigitNotNull,
                        'date' => $faker->date(),
                        'volume_number' => $faker->numerify('VOL-#####'),
                        'bond_type' => $faker->word,
                        'ownership' => $faker->word,
                        'property_type' => $faker->word,
                        'governorate' => $faker->state,
                        'district' => $faker->city,
                        'mortgage_notes' => $faker->sentence,
                        'registered_office' => $faker->company,
                        'specialized_department' => $faker->word,
                        'property_deed_image' => $faker->imageUrl(),
                        'notes' => $faker->paragraph,
                        'visibility' => $faker->boolean,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
