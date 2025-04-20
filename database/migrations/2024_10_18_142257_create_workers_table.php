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
      $table->integer('computer_number')->nullable()->comment('رقم الحاسبة');
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

      $table->string('civil_status_identity_number', 20)->nullable()->comment('رقم هوية الاحوال');
      $table->string('registration_number', 20)->nullable()->comment('رقم السجل');
      $table->string('record_number', 20)->nullable()->comment('رقم الصحيفة');
      $table->date('issue_date_civil_status')->nullable()->comment('تاريخ الاصدار');
      $table->string('issuing_authority_civil_status', 100)->nullable()->comment('جهة الاصدار');

      $table->string('nationality_certificate_number', 20)->nullable()->comment('رقم شهادة الجنسية');
      $table->string('wallet_number', 20)->nullable()->comment('رقم المحفظة');
      $table->date('issue_date_nationality_certificate')->nullable()->comment('تاريخ الاصدار');
      $table->string('issuing_authority_nationality_certificate', 100)->nullable()->comment('جهة الاصدار');

      $table->string('residence_card_number', 20)->nullable()->comment('رقم بطاقة السكن');
      $table->string('information_office', 100)->nullable()->comment('مكتب المعلومات');
      $table->date('organization_date')->nullable()->comment('تاريخ التنظيم');

      $table->string('ration_card_number', 20)->nullable()->comment('رقم البطاقة التموينية');
      $table->date('ration_card_date')->nullable()->comment('تاريخها');

      $table->string('national_card_number', 20)->nullable()->comment('رقم البطاقة الوطنية');
      $table->date('national_card_date')->nullable()->comment('تاريخها');

      $table->string('service_type', 50)->nullable()->comment('نوع الخدمة');
      $table->string('service_status', 50)->nullable()->comment('حالة الخدمة');

      $table->string('ministerial_order_number', 50)->nullable()->comment('رقم الامر الوزاري');
      $table->string('ministerial_order_date', 50)->nullable()->comment('رقم الامر الوزاري');
      $table->string('appointment_order_number', 50)->nullable()->comment('رقم امر التعيين');
      $table->date('appointment_date')->nullable()->comment('تاريخ التعيين');
      $table->date('start_work_date')->nullable()->comment('تاريخ المباشرة');
      $table->string('worker_token')->nullable()->comment('token');
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
