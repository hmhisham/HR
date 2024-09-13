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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('coaches_id')->nullable()->comment('تسلسل المدرب');
             $table->string('course_title')->comment('عنوان الدورة');
            $table->string('program_manager')->comment('مدير البرنامج التدريبي');
            $table->string('course_book_number')->comment('رقم كتاب الدورة');
            $table->date('course_book_date')->comment('تاريخ كتاب الدورة');
            $table->date('start_date')->comment('تاريخ الانعقاد');
            $table->date('end_date')->comment('تاريخ الانتهاء');
            $table->integer('nominees_number')->comment('عدد المرشحين');
            $table->integer('male_nominees')->comment('عدد الذكور');
            $table->integer('female_nominees')->comment('عدد الاناث');
            $table->string('location')->comment('مكان الانعقاد');
            $table->string('postponement_book_number')->nullable()->comment('رقم كتاب التاجيل');
            $table->date('postponement_book_date')->nullable()->comment('تاريخ كتاب التاجيل');
            $table->string('participation_book_number')->nullable()->comment('رقم كتاب المشاركه');
            $table->date('participation_book_date')->nullable()->comment('تاريخ كتاب المشاركه');
            $table->integer('participants_number')->comment('عدد المشاركين');
            $table->integer('male_participants')->comment('عدد الذكور المشاركين');
            $table->integer('female_participants')->comment('عدد الاناث المشاركين');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
