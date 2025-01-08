<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmailListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $batchSize = 100; // حجم الدفعة
        $totalRecords = 100; // إجمالي عدد السجلات

        for ($i = 0; $i < $totalRecords / $batchSize; $i++) {
            $emaillists = [];
            for ($j = 0; $j < $batchSize; $j++) {
                $emaillists[] = [
                    'user_id' => $faker->randomDigitNotNull,
                    'department' => $faker->randomElement(['HR', 'IT', 'Finance', 'Marketing']),
                    'email' => $faker->unique()->safeEmail(),
                    'notes' => $faker->paragraph,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('emaillists')->insert($emaillists);

            // تنظيف الذاكرة بعد كل دفعة
            unset($emaillists);

            // عرض تقدم العملية
            $this->command->info("Inserted batch " . ($i + 1) . " of " . ($totalRecords / $batchSize));
        }
    }
}
