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
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('worker_id')->nullable()->comment('رقم المستخدم');
            $table->integer('bonds_id')->nullable()->comment('رقم العقار');
            $table->date('from_date')->nullable()->comment('من تاريخ');
            $table->date('to_date')->nullable()->comment('الى تاريخ');
            $table->integer('months_count')->nullable()->comment('عدد الاشهر');
            $table->decimal('total_amount', 10, 2)->nullable()->comment('المبلغ الكلي');
            $table->decimal('paid_amount', 10, 2)->nullable()->comment('مجموع المسدد');
            $table->string('property_status')->nullable()->comment('حالة العقار');
            $table->boolean('status')->default(false)->comment('الحالة');
            $table->boolean('notifications')->default(false)->comment('الاشعارات');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
