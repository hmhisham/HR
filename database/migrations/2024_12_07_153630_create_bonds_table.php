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
        Schema::create('bonds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->string('boycott_id')->nullable()->comment('رقم المقاطعة');
            $table->string('part_number')->nullable()->comment('رقم القطعة');
            $table->string('property_number')->nullable()->comment('رقم العقار');
            $table->decimal('area_in_meters', 8, 2)->nullable()->comment('المساحة بالمتر');
            $table->decimal('area_in_olok', 8, 2)->nullable()->comment('المساحة بالأولك');
            $table->decimal('area_in_donum', 8, 2)->nullable()->comment('المساحة بالدونم');
            $table->integer('count')->nullable()->comment('العدد');
            $table->date('date')->nullable()->comment('التاريخ');
            $table->string('volume_number')->nullable()->comment('رقم الجلد');
            $table->string('ownership')->nullable()->comment('العائدية');
            $table->string('property_type')->nullable()->comment('جنس العقار');
            $table->string('governorate')->nullable()->comment('المحافظة');
            $table->string('district')->nullable()->comment('القضاء');
            $table->text('mortgage_notes')->nullable()->comment('إشارات التأمينات');
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
        Schema::dropIfExists('bonds');
    }
};
