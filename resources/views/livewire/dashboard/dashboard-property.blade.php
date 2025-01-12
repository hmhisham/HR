<div>
    <div class="row gy-4 mb-4">

        @php
            $stats = [
                [
                    'title' => 'المقاطعات',
                    'value' => $boycottsCount,
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
                    'change' => '+' . $bondsCount,
                    'changeClass' => 'text-primary',
                    'period' => 'عرض السندات',
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'الأملاك والاراضي',
                    'value' => $propertyCount,
                    'icon' => 'mdi-chart-line',
                    'bgClass' => 'bg-label-dark',
                    'hoverColor' => '#e2d9f3',
                    'change' => '+' . $propertyCount ,
                    'changeClass' => 'text-dark',
                    'period' => 'عرض الأملاك',
                    'route' => 'Boycotts.index'
                ],
                [
                    'title' => 'عدد المستفيدين',
                    'value' => '0',
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
                    'value' => '0',
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
                    'value' => '0',
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
                    <div class="card-body d-flex flex-column">
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
                        </div>
                        {{-- <div class="card-info mt-4 pt-1 mt-auto ">
                            <a href="{{ route($stat['route']) }}" class="{{ $stat['changeClass'] }}">{{ $stat['period'] }}</a>
                        </div> --}}
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

     <div class="col-12">
    </div>

    <!--  المتأخرين من الدفع-->
    <div class="row mb-3">
        <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center text-md-start">المتأخرين من الدفع</h5>
            <div class="card-datatable text-nowrap">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="DataTables_Table_1_length"><label>Show <select
                                        name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"
                                        class="form-select form-select-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <div id="DataTables_Table_1_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="form-control form-control-sm" placeholder=""
                                        aria-controls="DataTables_Table_1"></label></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="dt-column-search table table-bordered dataTable" id="DataTables_Table_1"
                            aria-describedby="DataTables_Table_1_info" style="width: 1230px;">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_1"
                                        rowspan="1" colspan="1" style="width: 162.2px;"
                                        aria-label="Name: activate to sort column descending" aria-sort="ascending">Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                        colspan="1" style="width: 233.2px;"
                                        aria-label="Email: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                        colspan="1" style="width: 228.2px;"
                                        aria-label="Post: activate to sort column ascending">Post</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                        colspan="1" style="width: 173.2px;"
                                        aria-label="City: activate to sort column ascending">City</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                        colspan="1" style="width: 81.2px;"
                                        aria-label="Date: activate to sort column ascending">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                        colspan="1" style="width: 87px;"
                                        aria-label="Salary: activate to sort column ascending">Salary</th>
                                </tr>
                                <tr>
                                    <th style="border-left: medium;" rowspan="1" colspan="1"><input type="text"
                                            class="form-control" placeholder="Search Name"></th>
                                    <th style="border-left: medium;" rowspan="1" colspan="1"><input type="text"
                                            class="form-control" placeholder="Search Email"></th>
                                    <th style="border-left: medium;" rowspan="1" colspan="1"><input
                                            type="text" class="form-control" placeholder="Search Post"></th>
                                    <th style="border-left: medium;" rowspan="1" colspan="1"><input
                                            type="text" class="form-control" placeholder="Search City"></th>
                                    <th style="border-left: medium;" rowspan="1" colspan="1"><input
                                            type="text" class="form-control" placeholder="Search Date"></th>
                                    <th style="border-left: medium; border-right: medium;" rowspan="1"
                                        colspan="1">
                                        <input type="text" class="form-control" placeholder="Search Salary">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd">
                                    <td class="sorting_1">Aila Quailadis</td>
                                    <td>aquail29@prlog.org</td>
                                    <td>Technical Writer</td>
                                    <td>Shuangchahe</td>
                                    <td>02/11/2021</td>
                                    <td>$24137.29</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">Aili De Coursey</td>
                                    <td>adew@etsy.com</td>
                                    <td>Environmental Specialist</td>
                                    <td>Łazy</td>
                                    <td>09/30/2021</td>
                                    <td>$14082.44</td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Alaric Beslier</td>
                                    <td>abeslier2n@zimbio.com</td>
                                    <td>Tax Accountant</td>
                                    <td>Ocucaje</td>
                                    <td>04/16/2021</td>
                                    <td>$19366.53</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">Aliza MacElholm</td>
                                    <td>amacelholm20@printfriendly.com</td>
                                    <td>VP Sales</td>
                                    <td>Sosnovyy Bor</td>
                                    <td>11/17/2021</td>
                                    <td>$16741.31</td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Allyson Moakler</td>
                                    <td>amoakler8@shareasale.com</td>
                                    <td>Safety Technician</td>
                                    <td>Mogilany</td>
                                    <td>12/29/2021</td>
                                    <td>$11677.32</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">Alma Harvatt</td>
                                    <td>aharvatt11@addtoany.com</td>
                                    <td>Administrative Assistant</td>
                                    <td>Ulundi</td>
                                    <td>11/04/2021</td>
                                    <td>$21782.82</td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Annetta Glozman</td>
                                    <td>aglozman1r@storify.com</td>
                                    <td>Staff Accountant</td>
                                    <td>Pendawanbaru</td>
                                    <td>08/25/2021</td>
                                    <td>$10745.32</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">Babb Skirving</td>
                                    <td>bskirving24@cbsnews.com</td>
                                    <td>Analyst Programmer</td>
                                    <td>Balky</td>
                                    <td>09/27/2021</td>
                                    <td>$24733.28</td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Bailie Coulman</td>
                                    <td>bcoulman1@yolasite.com</td>
                                    <td>VP Quality Control</td>
                                    <td>Hinigaran</td>
                                    <td>05/20/2021</td>
                                    <td>$13633.69</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">Beatrix Longland</td>
                                    <td>blongland12@gizmodo.com</td>
                                    <td>VP Quality Control</td>
                                    <td>Damu</td>
                                    <td>07/18/2021</td>
                                    <td>$22794.60</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Email</th>
                                    <th rowspan="1" colspan="1">Post</th>
                                    <th rowspan="1" colspan="1">City</th>
                                    <th rowspan="1" colspan="1">Date</th>
                                    <th rowspan="1" colspan="1">Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info" id="DataTables_Table_1_info" role="status"
                                aria-live="polite">
                                Showing 1 to 10 of 100 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="DataTables_Table_1_previous"><a aria-controls="DataTables_Table_1"
                                            aria-disabled="true" role="link" data-dt-idx="previous"
                                            tabindex="-1" class="page-link"><i class="ri-arrow-left-s-line"></i></a>
                                    </li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="DataTables_Table_1" role="link" aria-current="page"
                                            data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_1" role="link" data-dt-idx="1"
                                            tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_1" role="link" data-dt-idx="2"
                                            tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_1" role="link" data-dt-idx="3"
                                            tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_1" role="link" data-dt-idx="4"
                                            tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item disabled" id="DataTables_Table_1_ellipsis"><a
                                            aria-controls="DataTables_Table_1" aria-disabled="true" role="link"
                                            data-dt-idx="ellipsis" tabindex="-1" class="page-link">…</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="DataTables_Table_1" role="link" data-dt-idx="9"
                                            tabindex="0" class="page-link">10</a></li>
                                    <li class="paginate_button page-item next" id="DataTables_Table_1_next"><a
                                            href="#" aria-controls="DataTables_Table_1" role="link"
                                            data-dt-idx="next" tabindex="0" class="page-link"><i
                                                class="ri-arrow-right-s-line"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- الرسوم البيانية -->
    <div class="row">
        <!-- رسم بياني: Line Area Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">العمل اليومي</h5>
                        <small class="text-muted">قسم الأملاك و الأراضي</small>
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
