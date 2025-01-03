<div>
    <div class="row gy-4 mb-4">
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
                                <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between badge bg-label-dark rounded-pill py-0">
                                    <div class="me-2 mt-2 mb-n3">
                                        <h6 class="fw-bolder text-start mb-0">المشاريع</h6>
                                        <h4 class="text-dark">000</h4>
                                    </div>
                                    <div class="badge bg-dark rounded-pill fs-4 px-3">00</div>
                                </div>
                            </li>
                            <li class="mb-2 d-flex">
                                <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between badge bg-label-primary rounded-pill py-0">
                                    <div class="me-2 mt-2 mb-n3">
                                        <h6 class="fw-bolder text-start text-primary mb-0">الغير منجزة</h6>
                                        <h4 class="text-dark">00</h4>
                                    </div>
                                    <div class="badge bg-primary rounded-pill fw-bolder fs-4 px-3">00</div>
                                </div>
                            </li>
                            <li class="mb-2 d-flex">
                                <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between  badge bg-label-success rounded-pill py-0">
                                    <div class="me-2 mt-2 mb-n3">
                                        <h6 class="fw-bolder text-start text-success mb-0">المنجزة</h6>
                                        <h4 class="text-dark">00</h4>
                                    </div>
                                    <div class="badge bg-success rounded-pill fw-bolder fs-4 px-3">00</div>
                                </div>
                            </li>
                            <li class="mb-2 d-flex">
                                <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between badge bg-label-warning rounded-pill py-0">
                                    <div class="me-2 mt-2 mb-n3">
                                        <h6 class="fw-bolder text-start text-warning mb-0">متلكئ</h6>
                                        <h4 class="text-dark">00</h4>
                                    </div>
                                    <div class="badge bg-warning rounded-pill fw-bolder fs-4 px-3">00</div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between  badge bg-label-danger rounded-pill py-0">
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

        <!-- بطاقات الإحصائيات -->
        <div class="row">
            @php
                $stats = [
                    [
                        'title' => 'Total Sales',
                        'value' => '$13.4k',
                        'icon' => 'mdi-currency-usd',
                        'bgClass' => 'bg-label-success',
                        'change' => '+38%',
                        'changeClass' => 'text-success',
                        'period' => 'Last Six Month',
                    ],
                    [
                        'title' => 'Total Revenue',
                        'value' => '$24.8k',
                        'icon' => 'mdi-cash-multiple',
                        'bgClass' => 'bg-label-primary',
                        'change' => '+45%',
                        'changeClass' => 'text-primary',
                        'period' => 'Last Year',
                    ],
                    [
                        'title' => 'Total Profit',
                        'value' => '$18.7k',
                        'icon' => 'mdi-chart-line',
                        'bgClass' => 'bg-label-purple',
                        'change' => '+60%',
                        'changeClass' => 'text-purple',
                        'period' => 'Last Quarter',
                    ],
                    [
                        'title' => 'New Users',
                        'value' => '1.2k',
                        'icon' => 'mdi-account-multiple',
                        'bgClass' => 'bg-label-warning',
                        'change' => '+28%',
                        'changeClass' => 'text-warning',
                        'period' => 'Last Month',
                    ],
                    [
                        'title' => 'Active Projects',
                        'value' => '320',
                        'icon' => 'mdi-briefcase',
                        'bgClass' => 'bg-label-danger',
                        'change' => '+12%',
                        'changeClass' => 'text-danger',
                        'period' => 'Last Week',
                    ],
                    [
                        'title' => 'Completed Tasks',
                        'value' => '1.8k',
                        'icon' => 'mdi-check-circle',
                        'bgClass' => 'bg-label-info',
                        'change' => '+50%',
                        'changeClass' => 'text-info',
                        'period' => 'Last Day',
                    ],
                ];
            @endphp

            @foreach ($stats as $stat)
                <div class="col-xl-2 col-md-3 col-sm-6">
                    <div class="card h-100 shadow-sm hover-card">
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
                                <div class="badge bg-label-secondary rounded-pill">{{ $stat['period'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                            <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-calendar-month-outline"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="javascript:void(0);" class="dropdown-item">Today</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">Yesterday</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">Last 7 Days</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">Last 30 Days</a></li>
                                <li><hr class="dropdown-divider"></li>
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
                            <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-calendar-month-outline"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="javascript:void(0);" class="dropdown-item">Today</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">Yesterday</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">Last 7 Days</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">Last 30 Days</a></li>
                                <li><hr class="dropdown-divider"></li>
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

        <!-- أسلوب تنسيق البطاقة عند التمرير -->
        <style>
            .hover-card:hover {
                background-color: #eaf4f9;
                transition: background-color 0.3s ease;
            }
        </style>
    </div>
</div>
