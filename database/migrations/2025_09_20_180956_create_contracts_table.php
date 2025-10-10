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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->integer(column: 'user_id');
            $table->foreignId('property_folder_id')->constrained('property_folders')->comment('رقم الاضبارة');
            $table->string('document_contract_number')->nullable()->comment('رقم العقد في المستند');
            // $table->string('generated_contract_number')->nullable()->comment('رقم العقد المنشأ');
            $table->date('start_date')->nullable()->comment('تاريخ بداية العقد');
            $table->date('approval_date')->nullable()->comment('تاريخ المصادقة على العقد');
            $table->date('end_date')->nullable()->comment('تاريخ انتهاء العقد');
            $table->integer('tenant_name')->nullable()->comment('اسم المستأجر');
            $table->decimal('annual_rent_amount', 15, 0)->nullable()->comment('مبلغ التأجير للسنة الواحدة');
            // $table->string('amount_in_words')->nullable()->comment('المبلغ كتابةً');
            $table->string('lease_duration')->nullable()->comment('مدة الإيجار');
            $table->string('usage_type')->nullable()->comment('نوع الاستغلال');
            $table->string('notes')->nullable()->comment('الملاحظات');
            $table->string(column: 'file')->nullable()->comment('الملف');
            $table->string(column: 'id_type')->default('contract_01')->comment('نوع');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
