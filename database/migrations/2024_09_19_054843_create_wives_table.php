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
        Schema::create('wives', function (Blueprint $table) {
            $table->id();
            $table->string('workers_id')->comment('الاسم الموظف');
            $table->string('first_name')->comment('الاسم الأول');
            $table->string('father_name')->comment('اسم الأب');
            $table->string('grandfather_name')->comment('اسم الجد');
            $table->string('great_grandfather_name')->comment('اسم والد الجد');
            $table->string('surname')->nullable()->comment('اللقب');
            $table->string('full_name')->comment('الاسم الكامل');
            $table->string('marital_status')->comment('الحالة الزوجية');
            $table->string('occupational_status')->comment('الحالة المهنية');
            $table->string('organization_name')->nullable()->comment('اسم الدائرة');
            $table->boolean('is_married')->nullable()->comment('الحالة الزوجية');
            $table->string('national_id')->nullable()->comment('رقم البطاقة الوطنية');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wives');
    }
};
