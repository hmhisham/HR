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
        Schema::create('real_estate_bonds_sale_rental', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('رقم المستخدم');
            $table->integer('buyer_tenant_id')->comment('معرف المشتري أو المستأجر');
            $table->string('property_number')->comment('رقم السند العقاري');
            $table->date('from_date')->nullable()->comment('من تاريخ');
            $table->date('to_date')->nullable()->comment('الى تاريخ');
            $table->string('number_of_months')->nullable()->comment('عدد الاشهر');
            $table->string('insurance_amount')->nullable()->comment('مبلغ التثمين');
            $table->string('sale_amount')->nullable()->comment('مبلغ الرسو');
            $table->string('net_amount')->nullable()->comment('المبلغ الصافي');
            $table->string('monthly_amount')->nullable()->comment('المبلغ الشهري');
            $table->string('alert_duration')->nullable()->comment('مدة التنبيه');
            $table->string('company_department_email')->nullable()->comment('البريد الالكتروني للشركة او القسم');
            $table->string('real_estate_statement')->nullable()->comment('بيان العقار');
            $table->string('real_estate_status')->comment('حالة العقار');
            $table->boolean('notifications')->nullable()->default(0)->comment('الاشعارات');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_bonds_sale_rental');
    }
};
