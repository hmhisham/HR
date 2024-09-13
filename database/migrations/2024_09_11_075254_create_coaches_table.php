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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('calculator_number')->nullable()->comment('رقم الحاسبة');
            $table->string('name_coache', 100)->nullable()->comment('اسم المدرب'); // تحديد طول الحقل
            $table->string('education', 255)->nullable()->comment('التحصيل الدراسي');
            $table->string('phone_number', 20)->nullable()->unique()->comment('رقم الهاتف'); // تحديد طول الحقل
            $table->string('institution', 255)->nullable()->comment('مؤسسة المدرب');
            $table->string('training_field', 100)->nullable()->comment('مجال التدريب');
            $table->string('email', 100)->nullable()->unique()->comment('البريد الالكتروني'); // إضافة قيد unique
            $table->text('notes')->nullable()->comment('الملاحظات');
            // $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // علاقة مع جدول المستخدمين
            // $table->foreignId('calculator_number')->nullable()->constrained('calculators')->onDelete('set null'); // علاقة مع جدول الحاسبات
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
