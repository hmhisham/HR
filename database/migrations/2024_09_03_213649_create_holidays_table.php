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
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('order_number')->comment('رقم الامر الاداري');
            $table->date('order_date')->comment('تاريخ الامر الاداري');
            $table->string('holiday_type')->comment('نوع الاجازه');
            $table->string('holiday_purpose')->comment('الغرض من الاجازه');
            $table->integer('days_count')->comment('عدد الايام');
            $table->date('separation_date')->comment('تاريخ الانفكاك');
            $table->date('resumption_date')->comment('تاريخ المباشرة');
            $table->boolean('cut_off_holiday')->comment('قطع الاجازة');
            $table->string('file_path')->nullable()->comment('الملف');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidays');
    }
};
