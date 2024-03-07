<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * جدول الملاك 
     */
    public function up(): void
    {
        Schema::create('scalems', function (Blueprint $table) {
            $table->id();
            $table->string('grades_id');
            $table->string('phase_emp');//المرحلة الوظيفية
            $table->string('scalems_salary_grade');//درجة الراتب
            $table->string('scalems_salary_stage');//مرحلة الراتب
            $table->string('scalems_amount');//مقدار العلاوة
            $table->string('scalems_salary');//الراتب
            $table->string('scalems_minimum_period');//المدة الاصغرية
            $table->string('scalems_previous_salary');//الراتب السابق

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scalems');
    }
};
