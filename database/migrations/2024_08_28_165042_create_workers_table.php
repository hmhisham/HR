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
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('employee_number', 50)->nullable()->comment('الرقم الوظيفي');
            $table->string('paper_folder_number', 50)->nullable()->comment('رقم الاضبارة الورقية');
            $table->string('first_name', 50)->nullable()->comment('الاسم الاول');
            $table->string('father_name', 50)->nullable()->comment('اسم الاب');
            $table->string('grandfather_name', 50)->nullable()->comment('اسم الجد');
            $table->string('great_grandfather_name', 50)->nullable()->comment('اسم والد الجد');
            $table->string('surname', 50)->nullable()->comment('اللقب');
            $table->string('full_name', 50)->nullable()->comment('الاسم الكامل');
            $table->string('mother_name', 50)->nullable()->comment('اسم الام');
            $table->string('maternal_grandfather_name', 50)->nullable()->comment('اسم والد الام');
            $table->string('maternal_great_grandfather_name', 50)->nullable()->comment('اسم جد الام');
            $table->string('maternal_surname', 50)->nullable()->comment('لقب الام');
            $table->string('mother_full_name', 50)->nullable()->comment('اسم الام الكامل');
            $table->string('wife_name', 50)->nullable()->comment('اسم الزوجة');
            $table->integer('district_id')->nullable()->comment('القضاء');
            $table->integer('area_id')->nullable()->nullable()->comment('الناحية');
            $table->string('locality', 50)->nullable()->comment('المحلة');
            $table->string('phone_number', 50)->nullable()->comment('رقم الهاتف');
            $table->string('employee_id_number', 50)->nullable()->nullable()->comment('رقم هوية الموظف');
            $table->string('department_name', 50)->nullable()->comment('اسم الدائرة');
            $table->string('blood_type', 50)->nullable()->comment('صنف الدم');
            $table->string('email', 50)->nullable()->comment('الايميل');
            $table->date('birth_date')->nullable()->comment('تاريخ التولد');
            $table->string('birth_place', 50)->nullable()->comment('محل الولادة');
            $table->integer('governorate_id')->nullable()->comment('المحافظة');
            $table->string('marital_status', 50)->nullable()->comment('الحالة الزوجية');
            $table->string('religion', 50)->nullable()->comment('الديانة');
            $table->string('gender', 50)->nullable()->comment('الجنس');
            $table->integer('children_count')->nullable()->comment('عدد الاطفال');

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

            // $table->string('driving_license', 50)->nullable()->comment('اجازة السوق');
            // $table->date('license_expiry_date')->nullable()->comment('تاريخ الانتهاء');
            $table->string('education_service', 50)->nullable()->comment('التحصيل الدراسي اثناء الخدمة');
            $table->string('graduation_year_service', 50)->nullable()->comment('سنة التخرج اثناء الخدمة');
            $table->string('graduation_institution_service', 50)->nullable()->comment('جهة التخرج اثناء الخدمة');
            $table->string('specialization_service', 50)->nullable()->comment('الاختصاص اثناء الخدمة');
            $table->string('document_number', 50)->nullable()->comment('رقم الوثيقة');
            $table->date('document_date')->nullable()->comment('تاريخ الوثيقة');
            $table->string('document_verification_number', 50)->nullable()->comment('رقم صحة الصدور');
            $table->date('document_verification_date')->nullable()->comment('تاريخ صحة الصدور');
            $table->string('education_appointment', 50)->nullable()->comment('التحصيل الدراسي التعيين');
            $table->string('graduation_year_appointment', 50)->nullable()->comment('سنة تخرج التعيين');
            $table->string('graduation_institution_appointment', 50)->nullable()->comment('جهة تخرج التعيين');
            $table->string('specialization_appointment', 50)->nullable()->comment('الاختصاص التعيين');
            $table->string('service_type', 50)->nullable()->comment('نوع الخدمة');
            $table->string('service_status', 50)->nullable()->comment('حالة الخدمة');
            $table->string('contract_type', 50)->nullable()->comment('نوع العقد');
            $table->string('service_case_type', 50)->nullable()->comment('نوع حالة الخدمة');
            $table->string('general_specialization', 50)->nullable()->comment('التخصص العام');
            $table->string('precise_specialization', 50)->nullable()->comment('التخصص الدقيق');
            $table->string('degree', 50)->nullable()->comment('د / و');
            $table->string('position_title', 50)->nullable()->comment('العنوان الوظيفي');
            $table->string('ministerial_order_number', 50)->nullable()->comment('رقم الامر الوزاري');
            $table->string('ministerial_order_date', 50)->nullable()->comment('رقم الامر الوزاري');
            $table->string('appointment_order_number', 50)->nullable()->comment('رقم امر التعيين');
            $table->date('appointment_date')->nullable()->comment('تاريخ التعيين');
            $table->date('start_work_date')->nullable()->comment('تاريخ المباشرة');
            $table->string('promotion_order', 50)->nullable()->comment('امر الترفيع');
            $table->date('promotion_date')->nullable()->comment('تاريخ الترفيع');
            $table->date('entitlement_date')->nullable()->comment('تاريخ الاستحقاق');
            $table->string('increment_order', 50)->nullable()->comment('امر العلاوة');
            $table->date('increment_date')->nullable()->comment('تاريخ العلاوة');
            $table->string('referral_order_number', 50)->nullable()->comment('رقم امر الاحالة');
            $table->date('referral_order_date')->nullable()->comment('تاريخ رقم الاحالة');
            $table->string('termination_reason', 50)->nullable()->comment('انهاء التعيين');
            $table->date('transfer_date')->nullable()->comment('تاريخ النقل الينا');
            $table->date('resumption_date')->nullable()->comment('المباشرة');
            $table->string('binding_authority', 50)->nullable()->comment('الارتباط');
            $table->string('department', 50)->nullable()->comment('القسم');
            $table->string('division', 50)->nullable()->comment('الشعبة');
            $table->string('unit', 50)->nullable()->comment('الوحدة');
            $table->string('secondment_authority', 50)->nullable()->comment('جهة التنسيب');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->string('position', 50)->nullable()->comment('المنصب');
            $table->date('position_start_date')->nullable()->comment('مباشرة المنصب');
            $table->string('issuing_authority', 50)->nullable()->comment('جهة اصدار الامر');
            $table->string('assignment_order_number', 50)->nullable()->comment('رقم امر التكليف');
            $table->date('assignment_order_date')->nullable()->comment('تاريخ امر التكليف');
            $table->string('assignment_type', 50)->nullable()->comment('نوع التكليف');
            $table->string('assignment_status', 50)->nullable()->comment('حالة التكليف');
            $table->string('second_position', 50)->nullable()->comment('المنصب 2');
            $table->date('second_position_start_date')->nullable()->comment('مباشرة المنصب 2');
            $table->string('second_issuing_authority', 50)->nullable()->comment('جهة اصدار الامر 2');
            $table->string('second_assignment_order_number', 50)->nullable()->comment('رقم امر التكليف 2');
            $table->date('second_assignment_order_date')->nullable()->comment('تاريخ امر التكليف 2');
            $table->string('second_assignment_type', 50)->nullable()->comment('نوع التكليف2');
            $table->string('second_assignment_status', 50)->nullable()->comment('حالة التكليف2');
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
            $table->string('mypassword', 50)->nullable()->comment('كلمة السر');
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
