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
        // إذا كان العمود غير موجود، نضيفه أولاً بدون قيد
        if (!Schema::hasColumn('rentals', 'property_folder_id')) {
            Schema::table('rentals', function (Blueprint $table) {
                $table->unsignedBigInteger('property_folder_id')
                    ->nullable()
                    ->comment('رقم الاضبارة');
            });
        }

        // ثم نضيف القيد الأجنبي بشكل منفصل
        Schema::table('rentals', function (Blueprint $table) {
            $table->foreign('property_folder_id', 'rentals_property_folder_id_foreign')
                ->references('id')
                ->on('propertyfolder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            // إسقاط القيد والعمود
            $table->dropConstrainedForeignId('property_folder_id');
        });
    }
};
