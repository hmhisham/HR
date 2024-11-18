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
            $table->string('patch')->comment('رقم الرزمة');
            $table->string('itype', 2)->comment('نوع القيد');
            $table->string('idocument', 6)->comment('رقم المستند');
            $table->date('idate')->comment('تاريخ المستند');
            $table->decimal('idept',18,3)->comment('مبلغ المدين');
            $table->decimal('icredt',18,3)->comment('مبلغ الدائن');
            $table->string('iacct')->comment('الدليل');
            $table->string('isub')->comment('الافرادي');
            $table->string('icd')->comment('بداية الدليل');
            $table->string('idep')->comment('القسم');
            $table->string('irem')->comment('البيان');
            $table->string('note')->comment('ملاحظات');
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
