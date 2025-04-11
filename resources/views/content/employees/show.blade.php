@extends('layouts.contentNavbarLayout')

@section('title', 'تفاصيل الموظف')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">تفاصيل الموظف: {{ $employee->full_name }}</h5>
                    <a href="{{ route('employees.list') }}" class="btn btn-secondary btn-sm">
                        <i class="mdi mdi-arrow-right me-1"></i> العودة للقائمة
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- المعلومات الأساسية -->
                        <div class="col-md-12 mb-4">
                            <h6 class="fw-bold">المعلومات الأساسية</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">رقم الموظف</label>
                                    <p>{{ $employee->computer_number }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">الرقم الوظيفي</label>
                                    <p>{{ $employee->job_number }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">الاسم الرباعي واللقب</label>
                                    <p>{{ $employee->full_name }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">اسم الام</label>
                                    <p>{{ $employee->mother_name }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- المعلومات الأكاديمية -->
                        <div class="col-md-12 mb-4">
                            <h6 class="fw-bold">المعلومات الأكاديمية</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">التحصيل الدراسي</label>
                                    <p>{{ $employee->education }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">التخصص الدقيق</label>
                                    <p>{{ $employee->specialization }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- المعلومات الوظيفية -->
                        <div class="col-md-12 mb-4">
                            <h6 class="fw-bold">المعلومات الوظيفية</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">العنوان الوظيفي</label>
                                    <p>{{ $employee->job_title }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">الدرجة الوظيفية</label>
                                    <p>{{ $employee->job_grade }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">نوع العمل</label>
                                    <p>{{ $employee->job_type }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">تاريخ اخر ترفيع</label>
                                    <p>{{ $employee->last_promotion_date ? $employee->last_promotion_date->format('Y-m-d') : 'غير محدد' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- القسم والشعبة -->
                        <div class="col-md-12 mb-4">
                            <h6 class="fw-bold">القسم والشعبة</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">القسم</label>
                                    <p>{{ $employee->department }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">الشعبة</label>
                                    <p>{{ $employee->division }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- المعلومات الشخصية -->
                        <div class="col-md-12 mb-4">
                            <h6 class="fw-bold">المعلومات الشخصية</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">الجنس</label>
                                    <p>{{ $employee->gender }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">الحالة الزوجية</label>
                                    <p>{{ $employee->marital_status }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">عدد الاطفال</label>
                                    <p>{{ $employee->children_count }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">تاريخ الميلاد</label>
                                    <p>{{ $employee->birth_date ? $employee->birth_date->format('Y-m-d') : 'غير محدد' }}
                                    </p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">محل الولادة</label>
                                    <p>{{ $employee->birth_place }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">صنف الدم</label>
                                    <p>{{ $employee->blood_type ?? 'غير محدد' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">القومية</label>
                                    <p>{{ $employee->nationality }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">الديانة</label>
                                    <p>{{ $employee->religion }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
