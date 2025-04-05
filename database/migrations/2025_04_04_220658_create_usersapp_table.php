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
        Schema::create('usersapp', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('computer_number')->comment('رقم الحاسبة');
            $table->string('name')->comment('الاسم');
            $table->string('password')->comment('كلمة السر');
            $table->string('email')->unique()->comment('الايميل');
            $table->string('phone_number')->comment('رقم الهاتف');
            $table->string('national_id')->unique()->comment('رقم البطاقة الوطنية');
            $table->string('status')->default('active')->comment('الحالة');
            $table->string('note')->nullable()->comment('الملاحظات');
            $table->string('token')->nullable()->comment('التوكن');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersapp');
    }
};
