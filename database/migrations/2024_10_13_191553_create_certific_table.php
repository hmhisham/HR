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
    Schema::create('certific', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id')->nullable()->comment('رقم المستخدم');
      $table->unsignedBigInteger('worker_id')->comment('اسم الموظف');
      $table->integer('computer_number')->nullable()->comment('رقم الحاسبة');
      $table->string('document_number')->nullable()->comment('رقم الوثيقة');
      $table->date('document_date')->nullable()->comment('تاريخ الوثيقة');
      $table->string('certificates_id')->nullable()->comment('الشهادة');
      $table->string('authenticity_number')->nullable()->comment('رقم صحة الصدور');
      $table->date('authenticity_date')->nullable()->comment('تاريخ صحة الصدور');
      $table->string('graduations_id')->nullable()->comment('جهة التخرج');
      $table->string('specialization_id')->nullable()->comment('التخصص');
      $table->string('graduation_year')->nullable()->comment('سنة التخرج');
      $table->string('specialtys_id')->nullable()->comment('التخصص العام');
      $table->string('precises_id')->nullable()->comment('التخصص الدقيق');
      $table->string('specializationclassification_id')->nullable()->comment('تصنيف التخصص');
      $table->string('grade')->nullable()->comment('الدرجة');
      $table->string('estimate')->nullable()->comment('التقدير');
      $table->string('duration')->nullable()->comment('مدة القدم');
      $table->string('issuing_country')->nullable()->comment('البلد المانح للشهادة');
      $table->text('notes')->nullable()->comment('الملاحظات');
      $table->boolean('status')->nullable()->comment('الحالة');
      $table->string('certificate_file')->nullable()->comment('ملف الشهادة');
      $table->string('validity_ssuance_certificate_file')->nullable()->comment('ملف صحة الصدور');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('certific');
  }
};
