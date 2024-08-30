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
        Schema::create('thanks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('grantor')->comment('الجهة المانحة للشكر');
            $table->string('ministerial_order_number')->comment('رقم الامر الوزاري');
            $table->date('ministerial_order_date')->comment('تاريخ الامر الوزاري');
            $table->text('reason')->nullable()->comment('السبب من الشكر');
            $table->integer('months_of_service')->nullable()->comment('عدد اشهر القدم');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanks');
    }
};
