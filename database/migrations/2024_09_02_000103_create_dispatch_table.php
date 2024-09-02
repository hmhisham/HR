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
        Schema::create('dispatch', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('country_status')->nullable()->comment('داخل أو خارج البلد');
            $table->string('dispatch_subject')->nullable()->comment('موضوع الايفاد');
            $table->string('funding_agency')->nullable()->comment('الجهة الممولة');
            $table->string('dispatch_location')->nullable()->comment('مكان الايفاد');
            $table->string('resident_agency')->nullable()->comment('الجهة المقيمة للدولة');
            $table->date('travel_date')->nullable()->comment('تاريخ السفر');
            $table->integer('travel_days')->nullable()->comment('عدد أيام السفر');
            $table->integer('actual_dispatch_days')->nullable()->comment('عدد أيام الايفاد الفعلي');
            $table->date('start_date')->nullable()->comment('تاريخ المباشرة');
            $table->string('ministerial_order_number')->nullable()->comment('رقم الأمر الوزاري');
            $table->date('ministerial_order_date')->nullable()->comment('تاريخ الأمر الوزاري');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch');
    }
};
