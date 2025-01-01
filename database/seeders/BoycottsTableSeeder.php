<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BoycottsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ar_SA');
        $batchSize = 1000;
        $totalRecords = 1000;

        $usedBoycottNumbers = [];
        $usedBoycottNames = [];

        for ($i = 0; $i < $totalRecords / $batchSize; $i++) {
            $boycotts = [];
            for ($j = 0; $j < $batchSize; $j++) {
                do {
                    $boycottNumber = $faker->numberBetween(1000, 9999);
                } while (in_array($boycottNumber, $usedBoycottNumbers));

                do {
                    $boycottName = 'مقاطعة ' . $faker->unique()->numerify('####');
                } while (in_array($boycottName, $usedBoycottNames));

                $usedBoycottNumbers[] = $boycottNumber;
                $usedBoycottNames[] = $boycottName;

                $boycotts[] = [
                    'user_id' => 4, // دائماً يكون الرقم 4
                    'boycott_number' => $boycottNumber,
                    'boycott_name' => $boycottName,
                ];
            }

            DB::table('boycotts')->insert($boycotts);

            unset($boycotts);
            $this->command->info("Inserted batch " . ($i + 1) . " of " . ($totalRecords / $batchSize));
        }
    }
}
