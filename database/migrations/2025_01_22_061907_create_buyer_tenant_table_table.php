<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buyer_tenant', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('رقم المستخدم');
            $table->string('property_number')->comment('رقم العقار');
            $table->string('buyer_tenant_name')->comment('أسم المشتري أو المستأجر');
            $table->string('buyer_calculator_number')->nullable()->comment('رقم الحاسبة للمشتري');
            $table->string('buyer_tenant_phone_number')->comment('رقم هاتف المشتري أو المستأجر');
            $table->string('buyer_tenant_email')->nullable()->comment('البريد الالكتروني للمشتري أو المستأجر');
            $table->string('buyer_tenant_type')->nullable()->comment('مشتري أم مستأجر');
            $table->date('from_date')->nullable()->comment('من تاريخ');
            $table->date('to_date')->nullable()->comment('الى تاريخ');
            $table->string('number_of_months')->nullable()->comment('عدد الاشهر');
            $table->string('insurance_amount')->nullable()->comment('مبلغ التثمين');
            $table->string('sale_amount')->nullable()->comment('مبلغ الرسو');
            $table->string('net_amount')->nullable()->comment('المبلغ الصافي');
            $table->string('monthly_amount')->nullable()->comment('المبلغ الشهري');
            $table->string('alert_duration')->nullable()->comment('مدة التنبيه');
            $table->string('company_department_email')->nullable()->comment('البريد الالكتروني للشركة او القسم');
            $table->string('real_estate_status')->comment('حالة العقار');
            $table->boolean('notifications')->nullable()->default(0)->comment('الاشعارات');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }
=======
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('buyer_tenant', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id')->comment('رقم المستخدم');
      $table->string('property_number')->comment('رقم العقار');
      $table->string('buyer_tenant_name')->comment('أسم المشتري أو المستأجر');
      $table->string('buyer_computer_number')->nullable()->comment('رقم الحاسبة للمشتري');
      $table->string('buyer_tenant_phone_number')->comment('رقم هاتف المشتري أو المستأجر');
      $table->string('buyer_tenant_email')->nullable()->comment('البريد الالكتروني للمشتري أو المستأجر');
      $table->string('notes')->nullable()->comment('الملاحظات');
      $table->string('buyer_tenant_type')->nullable()->comment('مشتري أم مستأجر');
      $table->timestamps();
    });
  }
>>>>>>> 00f11ddd74f76cbca93548f9f3b4de63da9f751c

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('buyer_tenant');
  }
};
