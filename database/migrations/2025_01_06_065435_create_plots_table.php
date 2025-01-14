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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('province_id')->nullable()->comment('رقم واسم المقاطعة');
            $table->string('plot_number')->nullable()->comment('رقم القطعة');
            $table->string('property_deed_image')->nullable()->comment('صورة السند العقاري');
            $table->string('property_map_image')->nullable()->comment('صوره الخارطة العقارية');
            $table->string('specialized_department')->nullable()->comment('الشعبة المختصة');
            $table->timestamps();
            $table->index('plot_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
