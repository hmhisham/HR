<div>
    <div class="row gy-4 mb-4">
        @php
            $stats = [
                [
                    'title' => 'عدد المقاطعات',
                    'value' => $ProvincesCount,
                    'icon' => 'mdi-account-multiple',
                    'bgClass' => 'bg-label-success',
                    'hoverColor' => '#d4edda',
                    'change' => $ProvincesCount,
                    'changeClass' => 'text-success',
                    'period' => 'عرض المقاطعات',
                    // 'route' => 'Provinces.index'
                ],
                [
                    'title' => 'عدد القطع',
                    'value' => $PlotsCount,
                    'icon' => 'mdi-ship-wheel',
                    'bgClass' => 'bg-label-primary',
                    'hoverColor' => '#cce5ff',
                    'change' => $PlotsCount,
                    'changeClass' => 'text-primary',
                    'period' => 'عرض القطع',
                    'route' => 'Plots.index',
                ],
                [
                    'title' => 'عدد السندات',
                    'value' => $RealitiesCount,
                    'icon' => 'mdi-anchor',
                    'bgClass' => 'bg-label-warning',
                    'hoverColor' => '#fff3cd',
                    'change' => $RealitiesCount,
                    'changeClass' => 'text-warning',
                    'period' => 'عرض السندات',
                    'route' => 'Realities.index',
                ],
                [
                    'title' => ' عدد الاملاك',
                    'value' => $RealPropertyCount,
                    'icon' => 'mdi-chart-line',
                    'bgClass' => 'bg-label-dark',
                    'hoverColor' => '#e2d9f3',
                    'change' => $RealPropertyCount,
                    'changeClass' => 'text-dark',
                    'period' => 'عدد الاملاك',
                    'route' => 'Real-Property.index',
                ],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card h-100 shadow-lg hover-card"
                    style="--hover-bg-color: {{ $stat['hoverColor'] }}; @if (isset($stat['backgroundImage'])) background-image: {{ $stat['backgroundImage'] }}; background-size: cover; @endif">
                    <div class="card-body d-flex flex-column align-items-center p-3">
                        <div class="avatar mb-3">
                            <div class="avatar-initial {{ $stat['bgClass'] }} rounded-circle p-3">
                                <i class="mdi {{ $stat['icon'] }} mdi-36px text-light"></i>
                            </div>
                        </div>
                        <h3 class="mb-1 display-6">{{ $stat['value'] }}</h3>
                        <p class="h6 mb-0">{{ $stat['title'] }}</p>
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
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .avatar-initial {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .card-body {
            padding: 1rem;
        }

        .card-info {
            margin-top: 0.5rem;
        }
    </style>

    <!-- الرسوم البيانية -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">العمل اليومي</h5>
                        <small class="text-muted">متابعة حركة الشعب</small>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="lineAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!--/ الرسوم البيانية -->
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:load', function() {
        const chartData = @json($chartData); // تحويل بيانات PHP إلى JSON

        const labels = chartData.map(item => item.date); // تسميات المحور X (التواريخ)
        const realitiesData = chartData.map(item => item.realities); // بيانات السندات
        const realPropertyData = chartData.map(item => item.real_property); // بيانات الأملاك

        const ctx = document.getElementById('lineAreaChart').getContext('2d');
        new Chart(ctx, {
            type: 'line', // نوع المخطط (خطي)
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'السندات اليومية',
                        data: realitiesData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // لون الخلفية
                        borderColor: 'rgba(255, 99, 132, 1)', // لون الخط
                        borderWidth: 2,
                        fill: true, // تعبئة المنطقة تحت الخط
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)', // لون النقاط
                        pointBorderColor: '#fff', // لون حدود النقاط
                        pointHoverBackgroundColor: '#fff', // لون النقاط عند التمرير
                        pointHoverBorderColor: 'rgba(255, 99, 132, 1)', // لون حدود النقاط عند التمرير
                    },
                    {
                        label: 'الأملاك اليومية',
                        data: realPropertyData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // لون الخلفية
                        borderColor: 'rgba(54, 162, 235, 1)', // لون الخط
                        borderWidth: 2,
                        fill: true, // تعبئة المنطقة تحت الخط
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)', // لون النقاط
                        pointBorderColor: '#fff', // لون حدود النقاط
                        pointHoverBackgroundColor: '#fff', // لون النقاط عند التمرير
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)', // لون حدود النقاط عند التمرير
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                family: 'Cairo', // تطبيق خط Cairo
                                size: 14,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        bodyFont: {
                            family: 'Cairo', // تطبيق خط Cairo
                            size: 14,
                            weight: '600'
                        },
                        titleFont: {
                            family: 'Cairo', // تطبيق خط Cairo
                            size: 16,
                            weight: '700'
                        }
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'التاريخ',
                            font: {
                                family: 'Cairo', // تطبيق خط Cairo
                                size: 14,
                                weight: '700'
                            }
                        },
                        ticks: {
                            font: {
                                family: 'Cairo', // تطبيق خط Cairo
                                size: 12,
                                weight: '600'
                            }
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'عدد الحركات',
                            font: {
                                family: 'Cairo', // تطبيق خط Cairo
                                size: 14,
                                weight: '700'
                            }
                        },
                        ticks: {
                            font: {
                                family: 'Cairo', // تطبيق خط Cairo
                                size: 12,
                                weight: '600'
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
