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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->unsignedBigInteger('worker_id')->comment('الاسم');
            $table->unsignedBigInteger('linkage_id')->comment('الارتباط');
            $table->unsignedBigInteger('section_id')->comment('القسم');
            $table->unsignedBigInteger('branch_id')->comment('الشعبة');
            $table->unsignedBigInteger('unit_id')->comment('الوحدة');
            $table->string('position_name')->comment('اسم المنصب');
            $table->string('position_order_number')->comment('رقم امر التكليف');
            $table->date('position_order_date')->comment('تاريخ أمر التكليف');
            $table->date('position_start_date')->nullable()->comment('تاريخ المباشرة بالنصب');
            $table->string('commissioning_type')->comment('نوع التكليف');
            $table->string('commissioning_statu')->comment('حالة التكليف');
            $table->text('p_notes')->comment('ملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
