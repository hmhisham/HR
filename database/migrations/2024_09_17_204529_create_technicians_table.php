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
            $table->unsignedBigInteger('grades_id'); // معرّف درجة الموظف
            $table->string('phase_emp'); // المرحلة الوظيفية
            $table->unsignedTinyInteger('technicians_salary_grade'); // درجة الراتب
            $table->unsignedTinyInteger('technicians_salary_stage'); // مرحلة الراتب
            $table->decimal('technicians_amount', 8, 2); // مقدار العلاوة
            $table->decimal('technicians_salary', 8, 2); // الراتب
            $table->unsignedInteger('technicians_minimum_period'); // المدة الأصغرية بالأشهر
            $table->decimal('technicians_previous_salary', 8, 2); // الراتب السابق

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
