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
        Schema::create('placements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->unsignedBigInteger('worker_id')->comment('الاسم');
            $table->unsignedBigInteger('linkage_id')->comment('الارتباط');
            $table->unsignedBigInteger('section_id')->comment('القسم');
            $table->unsignedBigInteger('branch_id')->comment('الشعبة');
            $table->unsignedBigInteger('unit_id')->comment('الوحدة');
            $table->string('placement_order_number')->comment('رقم أمر التنسيب');
            $table->date('placement_order_date')->comment('تاريخ أمر التنسيب');
            $table->date('release_date')->nullable()->comment('تاريخ الانفكاك');
            $table->date('start_date')->nullable()->comment('تاريخ المباشرة');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placements');
    }
};
