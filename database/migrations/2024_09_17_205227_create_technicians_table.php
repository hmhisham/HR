<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *سلم رواتب العقود الفنيين
     */
    public function up(): void
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grades_id')
                  ->comment('معرّف درجة الموظف'); // معرّف درجة الموظف
            $table->string('phase_emp')
                  ->comment('المرحلة الوظيفية'); // المرحلة الوظيفية
            $table->unsignedTinyInteger('technicians_salary_grade')
                  ->comment('درجة الراتب'); // درجة الراتب
            $table->unsignedTinyInteger('technicians_salary_stage')
                  ->comment('مرحلة الراتب'); // مرحلة الراتب
            $table->integer('technicians_amount')
                  ->comment('مقدار العلاوة'); // مقدار العلاوة
            $table->integer('technicians_salary')
                  ->comment('الراتب'); // الراتب
            $table->unsignedInteger('technicians_minimum_period')
                  ->comment('المدة الأصغرية بالأشهر'); // المدة الأصغرية بالأشهر
            $table->integer('technicians_previous_salary')
                  ->comment('الراتب السابق'); // الراتب السابق

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
