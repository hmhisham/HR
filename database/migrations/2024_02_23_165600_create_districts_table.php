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
    Schema::create('districts', function (Blueprint $table) {
        $table->id();
        // $table->unsignedBigInteger('governorate_id'); // رقم المحافظة
        // $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
        $table->string('governorate_id'); // رقم المحافظة
        $table->string('district_number'); // رقم القضاء
        $table->string('district_name'); // اسم القضاء
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
