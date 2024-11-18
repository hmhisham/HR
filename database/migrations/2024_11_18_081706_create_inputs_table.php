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
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('رقم المستخدم');
            $table->string('patch')->nullable()->comment('رقم الرزمة');
            $table->string('itype', 2)->nullable()->comment('نوع القيد');
            $table->string('idocument', 6)->nullable()->comment('رقم المستند');
            $table->date('idate')->nullable()->comment('تاريخ المستند');
            $table->decimal('idept',18,3)->nullable()->comment('مبلغ المدين');
            $table->decimal('icredt',18,3)->nullable()->comment('مبلغ الدائن');
            $table->string('iacct')->nullable()->comment('الدليل');
            $table->string('isub')->nullable()->comment('الافرادي');
            $table->string('icd')->nullable()->comment('بداية الدليل');
            $table->string('idep')->nullable()->comment('القسم');
            $table->string('irem')->nullable()->comment('البيان');
            $table->string('note')->nullable()->comment('ملاحظات');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputs');
    }
};