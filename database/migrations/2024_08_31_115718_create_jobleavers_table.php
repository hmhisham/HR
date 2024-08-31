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
        Schema::create('jobleavers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('job_leaving_type')->comment('نوع ترك العمل');
            $table->string('issuing_authority')->comment('جهة اصدار الكتاب');
            $table->date('appointment_date')->comment('تاريخ التعيين');
            $table->date('disconnection_date')->comment('تاريخ الانقطاع');
            $table->date('return_date')->comment('تاريخ العودة');
            $table->integer('disconnection_duration')->comment('مدة الانقطاع');
            $table->string('ministerial_order_number')->comment('رقم الامر الوزاري');
            $table->date('ministerial_order_date')->comment('تاريخ الامر الوزاري');
            $table->string('added_service')->comment('الخدمة مضافه');
            $table->string('added_service_letter_number')->comment('رقم كتاب الخدمة المضافه');
            $table->date('added_service_letter_date')->comment('تاريخ كتاب الخدمه المضافة');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobleavers');
    }
};
