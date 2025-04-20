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

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('buyer_tenant');
  }
};
