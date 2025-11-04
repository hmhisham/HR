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
        Schema::create('valuations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('معرف المستخدم');
            $table->unsignedBigInteger('property_folder_id')->nullable()->comment('رقم الاضبارة');
            $table->date('date')->nullable()->comment('التاريخ');
            $table->decimal('amount', 15, 0)->nullable()->comment('المبلغ');
            $table->string('pdf_file')->nullable()->comment('ملف PDF');
            $table->text('notes')->nullable()->comment('الملاحظات');
            $table->timestamps();
        });

        Schema::table('valuations', function (Blueprint $table) {
            $table->foreign('property_folder_id', 'valuations_property_folder_id_foreign')
                ->references('id')
                ->on('propertyfolder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('valuations', function (Blueprint $table) {
            $table->dropConstrainedForeignId('property_folder_id');
        });
        Schema::dropIfExists('valuations');
    }
};

