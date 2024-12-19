<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');

            $table->integer('full_name')->nullable()->comment('الاسم الكامل');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->integer('department_name')->nullable()->comment('اسم القسم');
            $table->integer('email')->nullable()->comment('الايميل');

            $table->integer('bonds_id')->nullable()->comment('رقم العقار');
            $table->date('from_date')->nullable()->comment('من تاريخ');
            $table->date('to_date')->nullable()->comment('الى تاريخ');
            $table->integer('months_count')->nullable()->comment('عدد الاشهر');
            $table->decimal('total_amount', 10, 0)->nullable()->comment('المبلغ الكلي');
            $table->decimal('monthly_amount', 10, 0)->nullable()->comment('المبلغ الشهري');
            $table->decimal('paid_amount', 10, 0)->nullable()->comment('مجموع المسدد');
            $table->decimal('total_paid_amount', 10, 0)->nullable()->comment('مجموع المتبقي');
            $table->string('property_status')->nullable()->comment('حالة العقار');
            $table->boolean('status')->default(false)->comment('الحالة');
            $table->boolean('notifications')->default(false)->comment('الاشعارات');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
