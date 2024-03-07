<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * جدول العقود 
     */
    public function up(): void
    {
        Schema::create('scaleas', function (Blueprint $table) {
            $table->id();
            $table->string('grades_id');
            $table->string('phase_emp');//المرحلة الوظيفية
            $table->string('scaleas_salary_grade');//درجة الراتب
            $table->string('scaleas_salary_stage');//مرحلة الراتب
            $table->string('scaleas_amount');//مقدار العلاوة
            $table->string('scaleas_salary');//الراتب
            $table->string('scaleas_minimum_period');//المدة الاصغرية
            $table->string('scaleas_previous_salary');//الراتب السابق

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scaleas');
    }
};
