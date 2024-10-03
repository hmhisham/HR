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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('p_reason')->comment('سبب العقوبة');
            $table->string('p_issuing_authority')->comment('جهة الاصدار');
            $table->string('p_ministerial_order_number')->comment('رقم الامر الوزاري');
            $table->date('p_ministerial_order_date')->comment('تاريخ الامر الوزاري');
            $table->string('p_penalty_type')->comment('نوع العقوبة');
            $table->integer('duration _of_delay')->nullable()->comment('مدة التاخير');
            $table->text('p_notes')->comment('ملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalties');
    }
};
