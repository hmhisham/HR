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
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            $table->string('wives_id')->comment('اسم الام');
            $table->string('first_name')->comment('الاسم الأول');
            $table->string('father_name')->comment('اسم الأب');
            $table->string('grandfather_name')->comment('اسم الجد');
            $table->string('great_grandfather_name')->comment('اسم والد الجد');
            $table->string('surname')->nullable()->comment('اللقب');
            $table->string('full_name')->comment('الاسم الكامل');
            $table->date('birth_date')->comment('تاريخ الميلاد');
            $table->string('marital_status')->nullable()->comment('الحالة الزوجية');
            $table->string('gender')->comment('الجنس');
            $table->boolean('is_counted')->default(true)->comment('هل يتم احتسابه');
            $table->string('occupational_status')->nullable()->comment('الحالة الدراسية');
            $table->string('national_id')->nullable()->comment('رقم البطاقة الوطنية');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childrens');
    }
};
