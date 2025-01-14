<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = ['شعبة الأملاك', 'شعبة العقارات', 'شعبة إسكان الموانئ'];

        foreach (range(1, 5) as $province_id) {
            foreach (range(1, 2) as $plot_number) {
                DB::table('plots')->insert([
                    'user_id' => 4,  // تعيين رقم المستخدم إلى 4
                    'province_id' => $province_id,  // تعيين رقم المقاطعة
                    'plot_number' => $plot_number,  // تعيين رقم القطعة
                    'property_deed_image' => '81FLMcUIxuRI0DkgtbgvTLSjW1MkfCuqbxbk8eru.png',  // صورة السند العقاري
                    'property_map_image' => 'F8pcpIdaCusR5HeNpRVJo8FIIc7pdpfXchSNT8BH.png',  // صورة الخارطة العقارية
                    'specialized_department' => $departments[array_rand($departments)],  // الشعبة المختصة
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
