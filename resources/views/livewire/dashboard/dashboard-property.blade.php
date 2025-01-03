<div>
    <div class="row gy-4 mb-4">

        @php
            $stats = [
                [
                    'title' => 'المقاطعات',
                    'value' =>  $boycottsCount,
                    'icon' => 'mdi-map',
                    'bgClass' => 'bg-label-success',
                    'hoverColor' => '#d4edda',
                    'change' => '+' . $boycottsCount,
                    'changeClass' => 'text-success',
                    'period' => 'عرض المقاطعات'  ,
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'السندات العقارية',
                    'value' => $bondsCount,
                    'icon' => 'mdi-file-document',
                    'bgClass' => 'bg-label-primary',
                    'hoverColor' => '#cce5ff',
                    'change' => '+'. $bondsCount,
                    'changeClass' => 'text-primary',
                    'period' => 'عرض السندات',
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'الأملاك والاراضي',
                    'value' => $propertyCount,
                    'icon' => 'mdi-chart-line',
                    'bgClass' => 'bg-label-purple',
                    'hoverColor' => '#e2d9f3',
                    'change' => '+' . $propertyCount ,
                    'changeClass' => 'text-purple',
                    'period' => 'عرض الأملاك',
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'عدد المستفيدين',
                    'value' => '',
                    'icon' => 'mdi-account-multiple',
                    'bgClass' => 'bg-label-warning',
                    'hoverColor' => '#fff3cd',
                    'change' => '+',
                    'changeClass' => 'text-warning',
                    'period' => 'المستفيدين',
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'العقارات المؤجرة',
                    'value' => '',
                    'icon' => 'mdi-home-city',
                    'bgClass' => 'bg-label-danger',
                    'hoverColor' => '#f8d7da',
                    'change' => '+',
                    'changeClass' => 'text-danger',
                    'period' => 'العقارات المؤجرة',
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'المتخلفين من الدفع',
                    'value' => '',
                    'icon' => 'mdi-check-circle',
                    'bgClass' => 'bg-label-info',
                    'hoverColor' => '#d1ecf1',
                    'change' => '+',
                    'changeClass' => 'text-info',
                    'period' => 'عرض البيانات',
                    'route' => 'Boycotts.index'
                ],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div class="col-xl-2 col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm hover-card" style="--hover-bg-color: {{ $stat['hoverColor'] }};">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div class="avatar">
                                <div class="avatar-initial {{ $stat['bgClass'] }} rounded">
                                    <i class="mdi {{ $stat['icon'] }} mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 {{ $stat['changeClass'] }} me-1">{{ $stat['change'] }}</p>
                                <i class="mdi mdi-chevron-up {{ $stat['changeClass'] }}"></i>
                            </div>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2">{{ $stat['value'] }}</h5>
                            <p>{{ $stat['title'] }}</p>
                            <div class="badge bg-label-secondary rounded-pill">
                                <a href="{{ route($stat['route']) }}" class="{{ $stat['changeClass'] }}">{{ $stat['period'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--/ بطاقات الإحصائيات -->

    <!-- أسلوب تنسيق البطاقة عند التمرير -->
    <style>
        .hover-card:hover {
            background-color: var(--hover-bg-color);
            transition: background-color 0.3s ease;
        }
    </style>

    <!--/ بطاقات الإحصائيات -->
    <div class="col-12">
    </div>
    <!-- الرسوم البيانية -->
    <div class="row">
        <!-- رسم بياني: Line Area Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Last Updates</h5>
                        <small class="text-muted">Commercial Networks</small>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-calendar-month-outline"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item">Today</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Yesterday</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Last 7 Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Last 30 Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Current Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Last Month</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="lineAreaChart"></div>
                </div>
            </div>
        </div>
        <!--/ Line Area Chart -->

        <!-- رسم بياني: Bar Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
                    <h5 class="card-title mb-0">Data Science</h5>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-calendar-month-outline"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item">Today</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Yesterday</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Last 7 Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Last 30 Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Current Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item">Last Month</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="barChart"></div>
                </div>
            </div>
        </div>
        <!--/ Bar Chart -->
    </div>
    <!--/ الرسوم البيانية -->

    <div class="row mb-3">
        <div class="col-md-6 col-xl-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0 card-title me-2">إحصائيات المشاريع</h5>
                    <div class="dropdown">
                        <button class="p-0 btn" type="button" id="projectStatus" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical mdi-24px"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectStatus">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="pb-2 mb-3 d-flex justify-content-between">
                            <h5 class="mb-0">الوصف</h5>
                            <h5 class="mb-0">الاحصائية</h5>
                        </li>
                        <hr class="mt-n3">
                        <li class="mb-2 d-flex px-0">
                            <div
                                class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between badge bg-label-dark rounded-pill py-0">
                                <div class="me-2 mt-2 mb-n3">
                                    <h6 class="fw-bolder text-start mb-0">المشاريع</h6>
                                    <h4 class="text-dark">000</h4>
                                </div>
                                <div class="badge bg-dark rounded-pill fs-4 px-3">00</div>
                            </div>
                        </li>
                        <li class="mb-2 d-flex">
                            <div
                                class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between badge bg-label-primary rounded-pill py-0">
                                <div class="me-2 mt-2 mb-n3">
                                    <h6 class="fw-bolder text-start text-primary mb-0">الغير منجزة</h6>
                                    <h4 class="text-dark">00</h4>
                                </div>
                                <div class="badge bg-primary rounded-pill fw-bolder fs-4 px-3">00</div>
                            </div>
                        </li>
                        <li class="mb-2 d-flex">
                            <div
                                class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between  badge bg-label-success rounded-pill py-0">
                                <div class="me-2 mt-2 mb-n3">
                                    <h6 class="fw-bolder text-start text-success mb-0">المنجزة</h6>
                                    <h4 class="text-dark">00</h4>
                                </div>
                                <div class="badge bg-success rounded-pill fw-bolder fs-4 px-3">00</div>
                            </div>
                        </li>
                        <li class="mb-2 d-flex">
                            <div
                                class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between badge bg-label-warning rounded-pill py-0">
                                <div class="me-2 mt-2 mb-n3">
                                    <h6 class="fw-bolder text-start text-warning mb-0">متلكئ</h6>
                                    <h4 class="text-dark">00</h4>
                                </div>
                                <div class="badge bg-warning rounded-pill fw-bolder fs-4 px-3">00</div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div
                                class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between  badge bg-label-danger rounded-pill py-0">
                                <div class="me-2 mt-2 mb-n3">
                                    <h6 class="fw-bolder text-danger mb-0">متوقف</h6>
                                    <h4 class="text-dark">00</h4>
                                </div>
                                <div class="badge bg-danger rounded-pill fw-bolder fs-4 px-3">00</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
