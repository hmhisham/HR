<?php
    $configData = Helper::appClasses();
    $isFront = '';
?>



<?php $__env->startSection('title', 'لوحة المتابعة'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/swiper/swiper.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/cards-statistics.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/cards-analytics.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/swiper/swiper.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/dashboards-analytics.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row gy-4">


        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4">

            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <a href="<?php echo e(route('Employees.index')); ?>" class="menu-link">
                                <div class="avatar">
                                    <div
                                        class="avatar-initial bg-label-info rounded <?php echo e(request()->is('Employees') ? 'active' : ''); ?>">
                                        <span class="mdi mdi-account-group-outline"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2"><?php echo e(App\Models\Employees\Employees::count()); ?></h5>
                            <p class="text-muted">عدد الموظفين</p>
                            <div class="badge bg-label-secondary rounded-pill">بيانات جميع الموظفين</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="mdi mdi-link mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-success me-1">+62%</p>
                                <i class="mdi mdi-chevron-up text-success"></i>
                            </div>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2">142.8k</h5>
                            <p class="text-muted">Total Impression</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="card-info mt-4 pt-1">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Balance</h5>
                        <small class="text-muted">Commercial networks &amp; enterprises</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                        <h5 class="mb-0 me-3">$ 100,000</h5>
                        <span class="badge bg-label-secondary">
                            <i class="mdi mdi-arrow-down mdi-14px text-danger"></i>
                            <span class="align-middle">20%</span>
                        </span>
                    </div>
                </div>
                <div class="card-body" style="position: relative;">
                    <div id="lineChart" style="min-height: 400px;">
                        <div id="apexchartsayo3niev" class="apexcharts-canvas apexchartsayo3niev apexcharts-theme-light"
                            style="width: 1188px; height: 400px;"><svg id="SvgjsSvg1404" width="1188" height="400"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG1406" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(44.79998779296875, 10)">
                                    <defs id="SvgjsDefs1405">
                                        <clipPath id="gridRectMaskayo3niev">
                                            <rect id="SvgjsRect1412" width="1128.675012588501" height="360.584" x="-4.5"
                                                y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskayo3niev"></clipPath>
                                        <clipPath id="nonForecastMaskayo3niev"></clipPath>
                                        <clipPath id="gridRectMarkerMaskayo3niev">
                                            <rect id="SvgjsRect1413" width="1123.675012588501" height="359.584" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <line id="SvgjsLine1411" x1="399.3839330673218" y1="0"
                                        x2="399.3839330673218" y2="355.584" stroke="#b6b6b6" stroke-dasharray="3"
                                        stroke-linecap="butt" class="apexcharts-xcrosshairs" x="399.3839330673218" y="0"
                                        width="1" height="355.584" fill="#b1b9c4" filter="none"
                                        fill-opacity="0.9" stroke-width="1"></line>
                                    <g id="SvgjsG1419" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1420" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                            <text id="SvgjsText1422" font-family="Inter" x="0" y="384.584"
                                                text-anchor="middle" dominant-baseline="auto" font-size="11px"
                                                font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1423">7/12</tspan>
                                                <title>7/12</title>
                                            </text><text id="SvgjsText1425" font-family="Inter" x="79.97678661346436"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1426">8/12</tspan>
                                                <title>8/12</title>
                                            </text><text id="SvgjsText1428" font-family="Inter" x="159.9535732269287"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1429">9/12</tspan>
                                                <title>9/12</title>
                                            </text><text id="SvgjsText1431" font-family="Inter" x="239.93035984039307"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1432">10/12</tspan>
                                                <title>10/12</title>
                                            </text><text id="SvgjsText1434" font-family="Inter" x="319.9071464538574"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1435">11/12</tspan>
                                                <title>11/12</title>
                                            </text><text id="SvgjsText1437" font-family="Inter" x="399.8839330673218"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1438">12/12</tspan>
                                                <title>12/12</title>
                                            </text><text id="SvgjsText1440" font-family="Inter" x="479.86071968078613"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1441">13/12</tspan>
                                                <title>13/12</title>
                                            </text><text id="SvgjsText1443" font-family="Inter" x="559.8375062942505"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1444">14/12</tspan>
                                                <title>14/12</title>
                                            </text><text id="SvgjsText1446" font-family="Inter" x="639.8142929077148"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1447">15/12</tspan>
                                                <title>15/12</title>
                                            </text><text id="SvgjsText1449" font-family="Inter" x="719.7910795211792"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1450">16/12</tspan>
                                                <title>16/12</title>
                                            </text><text id="SvgjsText1452" font-family="Inter" x="799.7678661346436"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1453">17/12</tspan>
                                                <title>17/12</title>
                                            </text><text id="SvgjsText1455" font-family="Inter" x="879.7446527481079"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1456">18/12</tspan>
                                                <title>18/12</title>
                                            </text><text id="SvgjsText1458" font-family="Inter" x="959.7214393615723"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1459">19/12</tspan>
                                                <title>19/12</title>
                                            </text><text id="SvgjsText1461" font-family="Inter" x="1039.6982259750366"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1462">20/12</tspan>
                                                <title>20/12</title>
                                            </text><text id="SvgjsText1464" font-family="Inter" x="1119.675012588501"
                                                y="384.584" text-anchor="middle" dominant-baseline="auto"
                                                font-size="11px" font-weight="400" fill="#bbbcc4"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Inter;">
                                                <tspan id="SvgjsTspan1465">21/12</tspan>
                                                <title>21/12</title>
                                            </text>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1480" class="apexcharts-grid">
                                        <g id="SvgjsG1481" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1498" x1="0" y1="0"
                                                x2="1119.675012588501" y2="0" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1499" x1="0" y1="71.1168"
                                                x2="1119.675012588501" y2="71.1168" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1500" x1="0" y1="142.2336"
                                                x2="1119.675012588501" y2="142.2336" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1501" x1="0" y1="213.35039999999998"
                                                x2="1119.675012588501" y2="213.35039999999998" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1502" x1="0" y1="284.4672"
                                                x2="1119.675012588501" y2="284.4672" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1503" x1="0" y1="355.584"
                                                x2="1119.675012588501" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <g id="SvgjsG1482" class="apexcharts-gridlines-vertical">
                                            <line id="SvgjsLine1483" x1="0" y1="0" x2="0"
                                                y2="355.584" stroke="#eaeaec" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1484" x1="79.97678661346436" y1="0"
                                                x2="79.97678661346436" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1485" x1="159.9535732269287" y1="0"
                                                x2="159.9535732269287" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1486" x1="239.93035984039307" y1="0"
                                                x2="239.93035984039307" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1487" x1="319.9071464538574" y1="0"
                                                x2="319.9071464538574" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1488" x1="399.8839330673218" y1="0"
                                                x2="399.8839330673218" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1489" x1="479.86071968078613" y1="0"
                                                x2="479.86071968078613" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1490" x1="559.8375062942505" y1="0"
                                                x2="559.8375062942505" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1491" x1="639.8142929077148" y1="0"
                                                x2="639.8142929077148" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1492" x1="719.7910795211792" y1="0"
                                                x2="719.7910795211792" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1493" x1="799.7678661346436" y1="0"
                                                x2="799.7678661346436" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1494" x1="879.7446527481079" y1="0"
                                                x2="879.7446527481079" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1495" x1="959.7214393615723" y1="0"
                                                x2="959.7214393615723" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1496" x1="1039.6982259750366" y1="0"
                                                x2="1039.6982259750366" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                            <line id="SvgjsLine1497" x1="1119.675012588501" y1="0"
                                                x2="1119.675012588501" y2="355.584" stroke="#eaeaec"
                                                stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline">
                                            </line>
                                        </g>
                                        <line id="SvgjsLine1505" x1="0" y1="355.584" x2="1119.675012588501"
                                            y2="355.584" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1504" x1="0" y1="1" x2="0"
                                            y2="355.584" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1414" class="apexcharts-line-series apexcharts-plot-series">
                                        <g id="SvgjsG1415" class="apexcharts-series" seriesName="seriesx1"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1418"
                                                d="M0 23.705600000000004L79.97678661346436 118.52799999999999L159.9535732269287 94.82240000000002L239.93035984039307 142.2336L319.9071464538574 35.558400000000006L399.8839330673218 59.26400000000001L479.86071968078613 272.6144L559.8375062942505 248.90879999999999L639.8142929077148 118.52799999999999L719.7910795211792 177.792L799.7678661346436 165.9392L879.7446527481079 237.05599999999998L959.7214393615723 177.792L1039.6982259750366 237.05599999999998L1119.675012588501 296.32C1119.675012588501 296.32 1119.675012588501 296.32 1119.675012588501 296.32 "
                                                fill="none" fill-opacity="1" stroke="rgba(253,181,40,0.85)"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="5"
                                                stroke-dasharray="0" class="apexcharts-line" index="0"
                                                clip-path="url(#gridRectMaskayo3niev)"
                                                pathTo="M 0 23.705600000000004L 79.97678661346436 118.52799999999999L 159.9535732269287 94.82240000000002L 239.93035984039307 142.2336L 319.9071464538574 35.558400000000006L 399.8839330673218 59.26400000000001L 479.86071968078613 272.6144L 559.8375062942505 248.90879999999999L 639.8142929077148 118.52799999999999L 719.7910795211792 177.792L 799.7678661346436 165.9392L 879.7446527481079 237.05599999999998L 959.7214393615723 177.792L 1039.6982259750366 237.05599999999998L 1119.675012588501 296.32"
                                                pathFrom="M -1 355.584L -1 355.584L 79.97678661346436 355.584L 159.9535732269287 355.584L 239.93035984039307 355.584L 319.9071464538574 355.584L 399.8839330673218 355.584L 479.86071968078613 355.584L 559.8375062942505 355.584L 639.8142929077148 355.584L 719.7910795211792 355.584L 799.7678661346436 355.584L 879.7446527481079 355.584L 959.7214393615723 355.584L 1039.6982259750366 355.584L 1119.675012588501 355.584">
                                            </path>
                                            <g id="SvgjsG1416" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1511" r="0" cx="399.8839330673218"
                                                        cy="59.26400000000001"
                                                        class="apexcharts-marker w1lldm25z no-pointer-events"
                                                        stroke="#ffffff" fill="#fdb528" fill-opacity="1"
                                                        stroke-width="7" stroke-opacity="1" default-marker-size="0">
                                                    </circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1417" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1506" x1="0" y1="0" x2="1119.675012588501"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1507" x1="0" y1="0" x2="1119.675012588501"
                                        y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1508" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1509" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1510" class="apexcharts-point-annotations"></g>
                                </g>
                                <rect id="SvgjsRect1410" width="0" height="0" x="0" y="0" rx="0"
                                    ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                    fill="#fefefe"></rect>
                                <g id="SvgjsG1466" class="apexcharts-yaxis" rel="0"
                                    transform="translate(14.79998779296875, 0)">
                                    <g id="SvgjsG1467" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1468"
                                            font-family="Inter" x="20" y="11.5" text-anchor="end"
                                            dominant-baseline="auto" font-size="11px" font-weight="400" fill="#bbbcc4"
                                            class="apexcharts-text apexcharts-yaxis-label " style="font-family: Inter;">
                                            <tspan id="SvgjsTspan1469">300</tspan>
                                            <title>300</title>
                                        </text><text id="SvgjsText1470" font-family="Inter" x="20" y="82.6168"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#bbbcc4"
                                            class="apexcharts-text apexcharts-yaxis-label " style="font-family: Inter;">
                                            <tspan id="SvgjsTspan1471">240</tspan>
                                            <title>240</title>
                                        </text><text id="SvgjsText1472" font-family="Inter" x="20" y="153.7336"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#bbbcc4"
                                            class="apexcharts-text apexcharts-yaxis-label " style="font-family: Inter;">
                                            <tspan id="SvgjsTspan1473">180</tspan>
                                            <title>180</title>
                                        </text><text id="SvgjsText1474" font-family="Inter" x="20" y="224.85039999999998"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#bbbcc4"
                                            class="apexcharts-text apexcharts-yaxis-label " style="font-family: Inter;">
                                            <tspan id="SvgjsTspan1475">120</tspan>
                                            <title>120</title>
                                        </text><text id="SvgjsText1476" font-family="Inter" x="20" y="295.9672"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#bbbcc4"
                                            class="apexcharts-text apexcharts-yaxis-label " style="font-family: Inter;">
                                            <tspan id="SvgjsTspan1477">60</tspan>
                                            <title>60</title>
                                        </text><text id="SvgjsText1478" font-family="Inter" x="20" y="367.084"
                                            text-anchor="end" dominant-baseline="auto" font-size="11px"
                                            font-weight="400" fill="#bbbcc4"
                                            class="apexcharts-text apexcharts-yaxis-label " style="font-family: Inter;">
                                            <tspan id="SvgjsTspan1479">0</tspan>
                                            <title>0</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1407" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 200px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light"
                                style="left: 455.684px; top: 62.264px;">
                                <div class="px-3 py-2"><span>250%</span></div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                style="left: 414.659px; top: 367.584px;">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: Inter; font-size: 12px; min-width: 37.45px;">12/12</div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 1229px; height: 423px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HISHAM\Desktop\HR\HR\resources\views/content/Owner/Dashboard/Dashboard.blade.php ENDPATH**/ ?>