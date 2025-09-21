<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contracts\Contracts;
use App\Models\Propertyfolder\Propertyfolder;
use Illuminate\Support\Facades\Auth;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // الحصول على أول ملف عقار موجود
        $propertyFolder = Propertyfolder::first();

        if (!$propertyFolder) {
            // إنشاء ملف عقار تجريبي
            $propertyFolder = Propertyfolder::create([
                'user_id' => 1,
                'folder_number' => 1,
                'property_name' => 'عقار تجريبي',
                'id_property_location' => 1,
                'id_property_type' => 1,
                'id_property_description' => 1,
                'property_area' => 1000,
                'plot_number' => '123',
                'district_name' => 'منطقة تجريبية',
                'notes' => 'ملاحظات تجريبية'
            ]);
        }

        // إنشاء عقود تجريبية
        Contracts::create([
            'user_id' => 1,
            'property_folder_id' => $propertyFolder->id,
            'document_contract_number' => 'DOC-001',
            'generated_contract_number' => 'GEN-001',
            'start_date' => '2024-01-01',
            'approval_date' => '2024-01-02',
            'end_date' => '2024-12-31',
            'tenant_name' => 'مستأجر تجريبي 1',
            'annual_rent_amount' => 12000.00,
            'amount_in_words' => 'اثنا عشر ألف ريال',
            'lease_duration' => 'سنة واحدة',
            'usage_type' => 'سكني',
            'phone_number' => '123456789',
            'address' => 'عنوان تجريبي',
            'notes' => 'عقد تجريبي للاختبار'
        ]);

        Contracts::create([
            'user_id' => 1,
            'property_folder_id' => $propertyFolder->id,
            'document_contract_number' => 'DOC-002',
            'generated_contract_number' => 'GEN-002',
            'start_date' => '2024-02-01',
            'approval_date' => '2024-02-02',
            'end_date' => '2025-01-31',
            'tenant_name' => 'مستأجر تجريبي 2',
            'annual_rent_amount' => 15000.00,
            'amount_in_words' => 'خمسة عشر ألف ريال',
            'lease_duration' => 'سنة واحدة',
            'usage_type' => 'تجاري',
            'phone_number' => '987654321',
            'address' => 'عنوان تجريبي آخر',
            'notes' => 'عقد تجريبي آخر للاختبار'
        ]);

        $this->command->info('تم إنشاء بيانات تجريبية للعقود بنجاح!');
    }
}
