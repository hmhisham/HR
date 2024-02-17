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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('JobNumber')->nullable();
            $table->string('FileNumber')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('SecondName')->nullable();
            $table->string('ThirdName')->nullable();
            $table->string('FourthName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('FullName')->nullable();
            $table->string('MotherName')->nullable();
            $table->string('MotherFatherName')->nullable();
            $table->string('MotherGrandName')->nullable();
            $table->string('MotherLastName')->nullable();
            $table->string('FullMothersName')->nullable();
            $table->string('Status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
