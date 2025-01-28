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
        Schema::create('realities', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->string('province_id')->nullable()->comment('رقم المقاطعة');
            $table->string('plot_id')->nullable()->comment('رقم القطعة');
            $table->string('property_number')->nullable()->comment('رقم العقار');
            $table->string('area_in_meters')->nullable()->comment('المساحة بالمتر');
            $table->string('area_in_olok')->nullable()->comment('المساحة بالأولك');
            $table->string('area_in_donum')->nullable()->comment('المساحة بالدونم');
            $table->string('count')->nullable()->comment('العدد');
            $table->string('date')->nullable()->comment('التاريخ');
            $table->string('volume_number')->nullable()->comment('رقم الجلد');
            $table->string('propertycategory_id')->nullable()->comment('نوع العقار');
            $table->string('ownership')->nullable()->comment('العائدية');
            $table->string('property_type')->nullable()->comment('جنس العقار');
            $table->string('governorate')->nullable()->comment('المحافظة');
            $table->string('district')->nullable()->comment('القضاء');
            $table->string('mortgage_notes')->nullable()->comment('إشارات التأمينات');
            $table->string('registered_office')->nullable()->comment('الدائرة المسجل لديها');
            $table->string('specialized_department')->nullable()->comment('الشعبة المختصة');
            $table->string('property_deed_image')->nullable()->comment('صورة السند العقاري');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->boolean('visibility')->default(true)->comment('إمكانية ظهوره');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realities');
    }
};
