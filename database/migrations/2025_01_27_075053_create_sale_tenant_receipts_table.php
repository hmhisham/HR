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
        Schema::create('sale_tenant_receipts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('buyer_tenant_id');
            $table->string('property_number');
            $table->string('receipt_number')->comment('رقم الوصل');
            $table->date('receipt_date')->comment('تاريخ الوصل');
            $table->string('receipt_payer_name')->comment('أسم المسدد');
            $table->string('receipt_payment_amount')->comment('مبلغ التسديد');
            $table->date('receipt_from_date')->comment('من تاريخ');
            $table->date('receipt_to_date')->comment('الى تاريخ');
            $table->string('receipt_attach')->comment('صورة الوصل');
            $table->string('receipt_type')->comment('نوع الوصل'); // ايجار أو بيع
            $table->text('receipt_notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_tenant_receipts');
    }
};
