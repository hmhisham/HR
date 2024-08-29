<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('calculator_number', 15)->nullable()->comment('رقم الحاسبة');
            $table->string('employee_number', 15)->nullable()->comment('الرقم الوظيفي');
            $table->string('paper_folder_number', 15)->nullable()->comment('رقم الاضبارة الورقية');
            $table->string('first_name', 15)->comment('الاسم الاول');
            $table->string('father_name', 15)->comment('اسم الاب');
            $table->string('grandfather_name', 15)->comment('اسم الجد');
            $table->string('great_grandfather_name', 15)->comment('اسم والد الجد');
            $table->string('surname', 15)->comment('اللقب');
            $table->string('full_name', 15)->comment('الاسم الكامل');
            $table->string('mother_name', 15)->comment('اسم الام');
            $table->string('maternal_grandfather_name', 15)->comment('اسم والد الام');
            $table->string('maternal_great_grandfather_name', 15)->comment('اسم جد الام');
            $table->string('maternal_surname', 15)->comment('لقب الام');
            $table->string('mother_full_name', 15)->comment('اسم الام الكامل');
            $table->string('wife_name', 15)->nullable()->comment('اسم الزوجة');
            $table->integer('district_id')->comment('القضاء');
            $table->integer('area_id')->nullable()->comment('الناحية');
            $table->string('locality', 15)->comment('المحلة');
            $table->string('phone_number', 15)->comment('رقم الهاتف');
            $table->string('employee_id_number', 15)->nullable()->comment('رقم هوية الموظف');
            $table->string('department_name', 15)->nullable()->comment('اسم الدائرة');
            $table->string('blood_type', 15)->nullable()->comment('صنف الدم');
            $table->string('email', 15)->nullable()->comment('الايميل');
            $table->date('birth_date')->comment('تاريخ التولد');
            $table->string('birth_place', 15)->comment('محل الولادة');
            $table->integer('governorate_id')->comment('المحافظة');
            $table->string('marital_status', 15)->comment('الحالة الزوجية');
            $table->string('religion', 15)->comment('الديانة');
            $table->string('gender', 15)->comment('الجنس');
            $table->integer('children_count')->comment('عدد الاطفال');

            // Identity Information
            $table->string('civil_status_identity_number', 20)->nullable()->comment('رقم هوية الاحوال');
            $table->string('registration_number', 20)->nullable()->comment('رقم السجل');
            $table->string('record_number', 20)->nullable()->comment('رقم الصحيفة');
            $table->date('issue_date_civil_status')->nullable()->comment('تاريخ الاصدار');
            $table->string('issuing_authority_civil_status', 100)->nullable()->comment('جهة الاصدار');

            // Nationality Certificate Information
            $table->string('nationality_certificate_number', 20)->nullable()->comment('رقم شهادة الجنسية');
            $table->string('wallet_number', 20)->nullable()->comment('رقم المحفظة');
            $table->date('issue_date_nationality_certificate')->nullable()->comment('تاريخ الاصدار');
            $table->string('issuing_authority_nationality_certificate', 100)->nullable()->comment('جهة الاصدار');

            // Residence Card Information
            $table->string('residence_card_number', 20)->nullable()->comment('رقم بطاقة السكن');
            $table->string('information_office', 100)->nullable()->comment('مكتب المعلومات');
            $table->date('organization_date')->nullable()->comment('تاريخ التنظيم');

            // Ration Card Information
            $table->string('ration_card_number', 20)->nullable()->comment('رقم البطاقة التموينية');
            $table->date('ration_card_date')->nullable()->comment('تاريخها');

            // National Card Information
            $table->string('national_card_number', 20)->nullable()->comment('رقم البطاقة الوطنية');
            $table->date('national_card_date')->nullable()->comment('تاريخها');

            // $table->string('driving_license', 15)->nullable()->comment('اجازة السوق');
            // $table->date('license_expiry_date')->nullable()->comment('تاريخ الانتهاء');
            $table->string('education_service', 15)->nullable()->comment('التحصيل الدراسي اثناء الخدمة');
            $table->string('graduation_year_service', 15)->nullable()->comment('سنة التخرج اثناء الخدمة');
            $table->string('graduation_institution_service', 15)->nullable()->comment('جهة التخرج اثناء الخدمة');
            $table->string('specialization_service', 15)->nullable()->comment('الاختصاص اثناء الخدمة');
            $table->string('document_number', 15)->nullable()->comment('رقم الوثيقة');
            $table->date('document_date')->nullable()->comment('تاريخ الوثيقة');
            $table->string('document_verification_number', 15)->nullable()->comment('رقم صحة الصدور');
            $table->date('document_verification_date')->nullable()->comment('تاريخ صحة الصدور');
            $table->string('education_appointment', 15)->nullable()->comment('التحصيل الدراسي التعيين');
            $table->string('graduation_year_appointment', 15)->nullable()->comment('سنة تخرج التعيين');
            $table->string('graduation_institution_appointment', 15)->nullable()->comment('جهة تخرج التعيين');
            $table->string('specialization_appointment', 15)->nullable()->comment('الاختصاص التعيين');
            $table->string('service_type', 15)->nullable()->comment('نوع الخدمة');
            $table->string('service_status', 15)->nullable()->comment('حالة الخدمة');
            $table->string('contract_type', 15)->nullable()->comment('نوع العقد');
            $table->string('service_case_type', 15)->nullable()->comment('نوع حالة الخدمة');
            $table->string('general_specialization', 15)->nullable()->comment('التخصص العام');
            $table->string('precise_specialization', 15)->nullable()->comment('التخصص الدقيق');
            $table->string('degree', 15)->nullable()->comment('د / و');
            $table->string('position_title', 15)->nullable()->comment('العنوان الوظيفي');
            $table->string('appointment_order_number', 15)->nullable()->comment('رقم امر التعيين');
            $table->date('appointment_date')->nullable()->comment('تاريخ التعيين');
            $table->date('start_work_date')->nullable()->comment('تاريخ المباشرة');
            $table->string('promotion_order', 15)->nullable()->comment('امر الترفيع');
            $table->date('promotion_date')->nullable()->comment('تاريخ الترفيع');
            $table->date('entitlement_date')->nullable()->comment('تاريخ الاستحقاق');
            $table->string('increment_order', 15)->nullable()->comment('امر العلاوة');
            $table->date('increment_date')->nullable()->comment('تاريخ العلاوة');
            $table->string('referral_order_number', 15)->nullable()->comment('رقم امر الاحالة');
            $table->date('referral_order_date')->nullable()->comment('تاريخ رقم الاحالة');
            $table->string('termination_reason', 15)->nullable()->comment('انهاء التعيين');
            $table->date('transfer_date')->nullable()->comment('تاريخ النقل الينا');
            $table->date('resumption_date')->nullable()->comment('المباشرة');
            $table->string('binding_authority', 15)->nullable()->comment('الارتباط');
            $table->string('department', 15)->nullable()->comment('القسم');
            $table->string('division', 15)->nullable()->comment('الشعبة');
            $table->string('unit', 15)->nullable()->comment('الوحدة');
            $table->string('secondment_authority', 15)->nullable()->comment('جهة التنسيب');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->string('position', 15)->nullable()->comment('المنصب');
            $table->date('position_start_date')->nullable()->comment('مباشرة المنصب');
            $table->string('issuing_authority', 15)->nullable()->comment('جهة اصدار الامر');
            $table->string('assignment_order_number', 15)->nullable()->comment('رقم امر التكليف');
            $table->date('assignment_order_date')->nullable()->comment('تاريخ امر التكليف');
            $table->string('assignment_type', 15)->nullable()->comment('نوع التكليف');
            $table->string('assignment_status', 15)->nullable()->comment('حالة التكليف');
            $table->string('second_position', 15)->nullable()->comment('المنصب 2');
            $table->date('second_position_start_date')->nullable()->comment('مباشرة المنصب 2');
            $table->string('second_issuing_authority', 15)->nullable()->comment('جهة اصدار الامر 2');
            $table->string('second_assignment_order_number', 15)->nullable()->comment('رقم امر التكليف 2');
            $table->date('second_assignment_order_date')->nullable()->comment('تاريخ امر التكليف 2');
            $table->string('second_assignment_type', 15)->nullable()->comment('نوع التكليف2');
            $table->string('second_assignment_status', 15)->nullable()->comment('حالة التكليف2');
            $table->date('end_date')->nullable()->comment('الى تاريخ');
            $table->integer('service_days')->nullable()->comment('الخدمة يوم');
            $table->integer('service_months')->nullable()->comment('الخدمة شهر');
            $table->integer('service_years')->nullable()->comment('الخدمة سنة');
            $table->integer('total_retirement_days')->nullable()->comment('مجموع التقاعد يوم');
            $table->integer('total_retirement_months')->nullable()->comment('مجموع التقاعد شهر');
            $table->integer('total_retirement_years')->nullable()->comment('مجموع التقاعد سنة');
            $table->integer('total_actual_days')->nullable()->comment('مجموع الفعلية يوم');
            $table->integer('total_actual_months')->nullable()->comment('مجموع الفعلية شهر');
            $table->integer('total_actual_years')->nullable()->comment('مجموع الفعلية سنة');
            $table->integer('total_college_days')->nullable()->comment('مجموع الكلية يوم');
            $table->integer('total_college_months')->nullable()->comment('مجموع الكلية شهر');
            $table->integer('total_college_years')->nullable()->comment('مجموع الكلية سنة');
            $table->string('mypassword', 15)->nullable()->comment('كلمة السر');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};