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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('معرف المستخدم');
            $table->integer('tenant_name')->nullable()->comment('اسم المستأجر');
            $table->date('date')->nullable()->comment('التاريخ');
            $table->decimal('amount', 15, 0)->nullable()->comment('المبلغ');
            $table->string('pdf_file')->nullable()->comment('ملف PDF');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};