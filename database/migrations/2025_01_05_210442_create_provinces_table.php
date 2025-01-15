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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->integer('province_number')->nullable()->comment('رقم المقاطعة');
            $table->string('province_name')->nullable()->comment('اسم المقاطعة');
            $table->string('section_id')->nullable()->comment('رقم القسم');
            $table->timestamps();
            $table->index('province_number');
            $table->index('province_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
