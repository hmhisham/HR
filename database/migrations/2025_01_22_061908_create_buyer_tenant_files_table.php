<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buyer_tenant_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_tenant_id')->constrained('buyer_tenant')->onDelete('cascade')->comment('رقم المشتري او المستاجر المرتبط');
            $table->string('valuation_report_file')->nullable()->comment('محضر التثمين');
            $table->string('buyer_documents_file')->nullable()->comment('مستمسكات المشتري');
            $table->string('basra_municipality_statement_file')->nullable()->comment('بيان عدم استفادة البلدية والبلديات البصرة');
            $table->string('governorate_municipality_statement_file')->nullable()->comment('بيان عدم استفادة البلدية والبلديات محافظات');
            $table->string('written_pledge_file')->nullable()->comment('الإقرار الخطي');
            $table->string('company_deed_25_file')->nullable()->comment('السند العقاري 25 للشركة');
            $table->string('official_gazette_file')->nullable()->comment('اعلان الجريدة الرسمية');
            $table->string('bidder_deposits_file')->nullable()->comment('وصولات تأمينات المزايدين 5%');
            $table->string('sales_committee_minutes_file')->nullable()->comment('محضر لجنة البيع');
            $table->string('payment_receipt_2_percent_file')->nullable()->comment('وصل التسديد 2 %');
            $table->string('property_registration_letter_file')->nullable()->comment('كتاب تسجيل عقار الى التسجيل العقاري');
            $table->string('buyer_deed_23_file')->nullable()->comment('السند العقاري 23 باسم المشتري');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buyer_tenant_files');
    }
};
