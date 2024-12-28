<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     * إنشاء جدول propertypayd
     */
    public function up(): void
    {
        Schema::create('propertypayd', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('bonds_id')->nullable()->comment('رقم العقار');
            $table->string('receipt_number')->unique()->comment('رقم الإيصال');
            $table->date('receipt_date')->comment('تاريخ الإيصال');
            $table->decimal('amount', 18, 0)->comment('المبلغ');
            $table->string('receipt_file')->nullable()->comment('ملف الإيصال');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->boolean('isdeleted')->default(0)->comment('محذوف');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertypayd');
    }
};
