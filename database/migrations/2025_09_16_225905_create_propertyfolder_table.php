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
        Schema::create('propertyfolder', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('folder_number')->nullable()->comment('رقم الاضبارة');
            $table->string('property_name')->nullable()->comment('اسم العقار');
            $table->integer('id_property_location')->nullable()->comment('موقع العقار');
            $table->integer('id_property_type')->nullable()->comment('نوع العقار');
            $table->integer('id_property_description')->nullable()->comment('صفة العقار');
            $table->string('property_area')->nullable()->comment('مساحة العقار');
            $table->string('plot_number')->nullable()->comment('رقم القطعة');
            $table->string('district_name')->nullable()->comment('اسم المقاطعة');
            $table->string('notes')->nullable()->comment('الملاحظات');
            $table->string('property_files')->nullable()->comment('الملفات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertyfolder');
    }
};
