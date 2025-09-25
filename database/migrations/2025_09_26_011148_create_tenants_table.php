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

        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->integer(column: 'user_id');
            $table->string('name')->comment('اسم المستأجر');
            $table->string('phone')->nullable()->comment('رقم الهاتف');
            $table->string('email')->nullable()->comment('البريد الإلكتروني');
            $table->text('address')->nullable()->comment('العنوان');
            $table->text('pdf_file')->nullable()->comment('المستمسكات');
            $table->string('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
