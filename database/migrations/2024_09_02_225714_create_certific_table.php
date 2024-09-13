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
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('document_number')->nullable()->comment('رقم الوثيقة');
            $table->date('document_date')->nullable()->comment('تاريخ الوثيقة');
            $table->string('certificate_name')->nullable()->comment('الشهادة');
            $table->string('authenticity_number')->nullable()->comment('رقم صحة الصدور');
            $table->date('authenticity_date')->nullable()->comment('تاريخ صحة الصدور');
            $table->string('educational_attainment')->nullable()->comment('تحصيل الدراسي');
            $table->string('college_name')->nullable()->comment('اسم الكلية');
            // $table->string('department_name')->nullable()->comment('القسم الدراسي');
            $table->string('specialization')->nullable()->comment('التخصص');
            $table->string('graduation_year')->nullable()->comment('سنة التخرج');
            $table->string('grade')->nullable()->comment('التقدير والدرجة');
            $table->string('issuing_country')->nullable()->comment('البلد المانح للشهادة');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->boolean('status')->nullable()->comment('الحالة');
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
