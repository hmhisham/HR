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
            // المعلومات الأساسية
            $table->integer('computer_number')->comment('رقم الموظف');
            $table->integer('job_number')->comment('الرقم الوظيفي');
            $table->string('full_name')->comment('الاسم الرباعي واللقب');
            $table->string('mother_name')->comment('اسم الام');

            // المعلومات الأكاديمية
            $table->string('education')->comment('التحصيل الدراسي');
            $table->string('specialization')->comment('التخصص الدقيق');

            // المعلومات الوظيفية
            $table->string('job_title')->comment('العنوان الوظيفي');
            $table->string('job_grade')->comment('الدرجة الوظيفية');
            $table->string('job_type')->comment('نوع العمل');
            $table->date('last_promotion_date')->nullable()->comment('تاريخ اخر ترفيع');

            // تغيير العنوان الوظيفي
            $table->string('job_title_change_order_number')->nullable()->comment('رقم امر تغيير عنوان الوظيفة');
            $table->date('job_title_change_order_date')->nullable()->comment('تاريخ امر تغيير عنوان الوظيفة');

            // الرواتب والعلاوات
            $table->decimal('nominal_salary', 10, 2)->comment('الراتب الاسمي');
            $table->date('last_allowance_date')->nullable()->comment('تاريخ اخر علاوة');
            $table->string('allowance_order_number')->nullable()->comment('رقم امر العلاوة');
            $table->date('allowance_order_date')->nullable()->comment('تاريخ امر العلاوة');

            // استمرارية الخدمة
            $table->boolean('service_continuity')->default(true)->comment('استمرارية الخدمة');
            $table->date('service_continuity_stop_date')->nullable()->comment('تاريخ ايقاف استمرارية الخدمة');
            $table->string('service_continuity_stop_order_number')->nullable()->comment('رقم امر كتاب الايقاف');
            $table->date('service_continuity_stop_order_date')->nullable()->comment('تاريخ امر كتاب الايقاف');

            // القسم والشعبة
            $table->string('department')->comment('القسم');
            $table->string('division')->comment('الشعبة');

            // مدة الخدمة
            $table->integer('service_days')->default(0)->comment('الخدمة يوم');
            $table->integer('service_months')->default(0)->comment('الخدمة شهر');
            $table->integer('service_years')->default(0)->comment('الخدمة سنة');

            // المنصب
            $table->string('position_status')->comment('حالة المنصب');
            $table->string('position')->comment('المنصب');
            $table->string('position_assignment_order_number')->nullable()->comment('رقم الامر بتولية المنصب');
            $table->date('position_assignment_order_date')->nullable()->comment('تاريخ الامر بتولية المنصب');
            $table->date('position_start_date')->nullable()->comment('تاريخ المباشرة بالمنصب');

            // الحالة الوظيفية
            $table->string('employment_status')->comment('الحالة الوظيفية');
            $table->string('appointment_letter_number')->nullable()->comment('رقم كتاب التعيين');
            $table->date('appointment_date')->nullable()->comment('تاريخ التعيين');
            $table->string('commencement_letter_number')->nullable()->comment('رقم كتاب المباشرة');
            $table->date('commencement_letter_date')->nullable()->comment('تاريخ كتاب المباشرة');
            $table->date('actual_commencement_date')->nullable()->comment('تاريخ المباشرة الفعلي');

            // الخدمة المضافة
            $table->string('additional_service_type')->nullable()->comment('نوع الخدمة المضافة');
            $table->string('additional_service_order_number')->nullable()->comment('رقم امر الخدمة المضافة');
            $table->date('additional_service_order_date')->nullable()->comment('تاريخ امر الخدمة المضافة');
            $table->integer('additional_service_days')->default(0)->comment('الخدمة المضافة يوم');
            $table->integer('additional_service_months')->default(0)->comment('الخدمة المضافة شهر');
            $table->integer('additional_service_years')->default(0)->comment('الخدمة المضافة سنة');

            // النقل
            $table->boolean('transferred_to_ministry')->default(false)->comment('هل الموظف منقول الى الوزارة');
            $table->string('transferred_from')->nullable()->comment('الجهة المنقول منها');
            $table->string('transfer_order_number')->nullable()->comment('رقم الامر الاداري للنقل');
            $table->date('transfer_order_date')->nullable()->comment('تاريخ الامر للنقل');
            $table->string('transfer_commencement_order_number')->nullable()->comment('رقم الامر الاداري الخاص بالمباشرة للنقل');
            $table->date('transfer_commencement_order_date')->nullable()->comment('تاريخ الامر الاداري الخاص بالمباشرة للنقل');
            $table->date('transfer_commencement_date')->nullable()->comment('تاريخ المباشرة للنقل');

            // المعلومات الشخصية
            $table->string('gender')->comment('الجنس');
            $table->string('marital_status')->comment('الحالة الزوجية');
            $table->integer('children_count')->default(0)->comment('عدد الاطفال');
            $table->string('spouse_name')->nullable()->comment('اسم الزوج/الزوجة');
            $table->string('spouse_job')->nullable()->comment('عمل الزوج/الزوجة');
            $table->string('spouse_workplace')->nullable()->comment('محل عمل الزوج/الزوجة');
            $table->string('phone_number')->nullable()->comment('رقم هاتف');
            $table->text('address')->comment('عنوان السكن');
            $table->date('birth_date')->comment('تاريخ الميلاد');
            $table->string('birth_place')->comment('محل الولادة');
            $table->string('blood_type')->nullable()->comment('صنف الدم');
            $table->string('nationality')->comment('القومية');
            $table->string('religion')->comment('الديانة');
            $table->string('housing_card_number')->nullable()->comment('رقم بطاقة السكن');

            // المعلومات الإدارية
            $table->string('office_name')->comment('اسم مكتب');
            $table->date('organization_date')->nullable()->comment('تاريخ التنظيم');
            $table->string('ration_card_number')->nullable()->comment('رقم بطاقة تموينية');
            $table->string('ration_center_name')->nullable()->comment('اسم مركز التمويني');
            $table->string('ration_center_number')->nullable()->comment('رقم المركز التمويني');
            $table->string('national_id_number')->comment('رقم البطاقة الوطنية');
            $table->date('national_id_date')->nullable()->comment('تاريخ البطاقة الوطنية');

            $table->timestamps();
            $table->softDeletes();
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
