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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->unsignedBigInteger('workers_id')->comment('اسم الموظف');
            $table->string('service_type', 50)->nullable()->comment('نوع الخدمة');
            $table->string('administrative_order_number', 50)->nullable()->comment('رقم امر الاداري');
            $table->date('administrative_order_date')->nullable()->comment('تاريخ امر الاداري');
            $table->date('from_date')->nullable()->comment('من تاريخ');
            $table->date('to_date')->nullable()->comment('الى تاريخ');
            $table->string('days', 50)->nullable()->comment('يوم');
            $table->string('months', 50)->nullable()->comment('شهر');
            $table->string('years', 50)->nullable()->comment('سنة');
            $table->string('in_service_salary', 50)->nullable()->comment('الراتب خلال المدة');
            $table->string('certificates_id', 50)->nullable()->comment('الشهادة');
            $table->string('calculation_order_number', 50)->nullable()->comment('رقم امر الاحتساب');
            $table->date('calculation_order_date')->nullable()->comment('تاريخ امر الاحتساب');
            $table->string('purpose', 50)->nullable()->comment('الغرض');
            $table->string('job_title_deletion', 100)->nullable()->comment('العنوان الوظيفي الحذف');
            $table->string('job_title_introduction', 100)->nullable()->comment('العنوان الوظيفي الاستحداث');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
