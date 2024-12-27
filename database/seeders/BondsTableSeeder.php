<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BondsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $batchSize = 1000; // حجم الدفعة
        $totalRecords = 1000000000; // إجمالي عدد السجلات

        for ($i = 0; $i < $totalRecords / $batchSize; $i++) {
            $bonds = [];
            for ($j = 0; $j < $batchSize; $j++) {
                $bonds[] = [
                    'user_id' => $faker->randomDigitNotNull,
                    'boycott_id' => $faker->numerify('######'),
                    'part_number' => $faker->numerify('######'),
                    'property_number' => $faker->numerify('######'),
                    'area_in_meters' => $faker->randomFloat(2, 1, 1000),
                    'area_in_olok' => $faker->randomFloat(2, 1, 1000),
                    'area_in_donum' => $faker->randomFloat(2, 1, 1000),
                    'count' => $faker->randomNumber(),
                    'date' => $faker->date(),
                    'volume_number' => $faker->regexify('[A-Z0-9]{5}'),
                    'bond_type' => $faker->word,
                    'ownership' => $faker->word,
                    'property_type' => $faker->word,
                    'governorate' => $faker->state,
                    'district' => $faker->city,
                    'mortgage_notes' => $faker->sentence,
                    'registered_office' => $faker->company,
                    'specialized_department' => 'شعبة الاملاك',
                    'property_deed_image' => 'صورة السند العقاري',
                    'notes' => $faker->paragraph,
                    'visibility' => $faker->boolean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('bonds')->insert($bonds);

            // تنظيف الذاكرة بعد كل دفعة
            unset($bonds);

            // عرض تقدم العملية
            $this->command->info("Inserted batch " . ($i + 1) . " of " . ($totalRecords / $batchSize));
        }
    }
}
