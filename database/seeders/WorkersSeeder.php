<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersSeeder extends Seeder
{
  public function run()
  {
    $faker = Faker::create();

    $batchSize = 1000; // حجم كل دفعة
    $totalRows = 1000000; // إجمالي عدد الأسطر

    for ($i = 0; $i < $totalRows; $i += $batchSize) {
      $data = [];
      for ($j = 0; $j < $batchSize; $j++) {
        $data[] = [
          'user_id' => $faker->numberBetween(1, 3),
          'computer_number' => $faker->numberBetween(100000, 999999),
          'employee_number' => $faker->unique()->numerify('EMP#####'),
          'paper_folder_number' => $faker->unique()->numerify('PAPER#####'),
          'first_name' => $faker->firstName(),
          'father_name' => $faker->lastName(),
          'grandfather_name' => $faker->lastName(),
          'great_grandfather_name' => $faker->lastName(),
          'surname' => $faker->lastName(),
          'full_name' => $faker->name(),
          'mother_name' => $faker->firstName(),
          'maternal_grandfather_name' => $faker->lastName(),
          'maternal_great_grandfather_name' => $faker->lastName(),
          'maternal_surname' => $faker->lastName(),
          'mother_full_name' => $faker->name('female'),
          'wife_name' => $faker->name('female'),
          'district_id' => $faker->numberBetween(1, 10),
          'area_id' => $faker->numberBetween(1, 50),
          'locality' => $faker->city(),
          'phone_number' => $faker->phoneNumber(),
          'employee_id_number' => $faker->unique()->numerify('ID#####'),
          'department_name' => $faker->company(),
          'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
          'email' => $faker->unique()->safeEmail(),
          'birth_date' => $faker->date(),
          'birth_place' => $faker->city(),
          'governorate_id' => $faker->numberBetween(1, 20),
          'marital_status' => $faker->randomElement(['متزوج', 'عازب', 'مطلق', 'أرمل']),
          'religion' => $faker->randomElement(['مسلم', 'مسيحي', 'يهودي', 'غير ذلك']),
          'gender' => $faker->randomElement(['ذكر', 'أنثى']),
          'children_count' => $faker->numberBetween(0, 10),
          'civil_status_identity_number' => $faker->numerify('###########'),
          'registration_number' => $faker->numerify('REG#####'),
          'record_number' => $faker->numerify('REC#####'),
          'issue_date_civil_status' => $faker->date(),
          'issuing_authority_civil_status' => $faker->company(),
          'nationality_certificate_number' => $faker->numerify('NC#####'),
          'wallet_number' => $faker->numerify('WALLET#####'),
          'issue_date_nationality_certificate' => $faker->date(),
          'issuing_authority_nationality_certificate' => $faker->company(),
          'residence_card_number' => $faker->numerify('RES#####'),
          'information_office' => $faker->company(),
          'organization_date' => $faker->date(),
          'ration_card_number' => $faker->numerify('RAT#####'),
          'ration_card_date' => $faker->date(),
          'national_card_number' => $faker->numerify('NAT#####'),
          'national_card_date' => $faker->date(),
          'service_type' => $faker->randomElement(['دائم', 'مؤقت']),
          'service_status' => $faker->randomElement(['نشط', 'غير نشط']),
          'ministerial_order_number' => $faker->numerify('ORD#####'),
          'ministerial_order_date' => $faker->date(),
          'appointment_order_number' => $faker->numerify('APP#####'),
          'appointment_date' => $faker->date(),
          'start_work_date' => $faker->date(),
          'worker_token' => $faker->uuid(),
          // 'mypassword' => bcrypt('password'),
          'created_at' => now(),
          'updated_at' => now(),
        ];
      }

      DB::table('workers')->insert($data); // إدراج الدفعة في الجدول
    }
  }
}
