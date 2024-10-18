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
        Schema::create('precises', function (Blueprint $table) {
            $table->id();
            $table->string('specialtys_id'); //الرمز
            $table->string('precises_code'); //الرمز
            $table->string('precises_name'); //التخصص الدقيق
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precises');
    }
};
