@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/commonMaster')

@php
    /* Display elements */
    $contentNavbar = $contentNavbar ?? true;
    $isNavbar = $isNavbar ?? true;
    $isMenu = $isMenu ?? true;
    $isFlex = $isFlex ?? false;
    $isFooter = $isFooter ?? true;
    $customizerHidden = $customizerHidden ?? '';
    $pricingModal = $pricingModal ?? false;

    /* HTML Classes */
    $navbarDetached = 'navbar-detached';
    $menuFixed = isset($configData['menuFixed']) ? $configData['menuFixed'] : '';
    $navbarFixed = isset($configData['navbarFixed']) ? $configData['navbarFixed'] : '';
    $footerFixed = isset($configData['footerFixed']) ? $configData['footerFixed'] : '';
    $menuCollapsed = isset($configData['menuCollapsed']) ? $configData['menuCollapsed'] : '';
    $menuFlipped = isset($configData['menuFlipped']) ? $configData['menuFlipped'] : '';
    /* $menuOffcanvas = (isset($configData['menuOffcanvas']) ? $configData['menuOffcanvas'] : ''); */

    /* Content classes */
    $container = $container ?? 'container-xxl';

@endphp

@section('layoutContent')
    <div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }}">
        <div class="layout-container">

            @if ($isMenu)
                {{-- @include('layouts/sections/menu/verticalMenu') --}}
                @role(['OWNER', 'Administrator', 'Supervisor', 'Employee'])
                    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                        <div class="app-brand demo">
                            <a href="{{ url('/') }}" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/img/logo/GCPI.png') }}" class="rounded img-fluid"
                                        style="width: 50px;">
                                    {{-- @include('_partials.macros', ['width' => 25, 'withbg' => '#666cff']) --}}
                                </span>
                                <span class="app-brand-text demo menu-text fw-bold ms-2 fs-5">ادارة البيانات</span>
                            </a>

                            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                                        fill="currentColor" fill-opacity="0.6" />
                                    <path
                                        d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                                        fill="currentColor" fill-opacity="0.38" />
                                </svg>
                            </a>
                        </div>

                        <div class="menu-inner-shadow"></div>

                        <ul class="py-1 menu-inner">

                            {{-- Dashboard --}}
                            <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ Route('Dashboard') }}" class="menu-link">
                                    <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                                    <div>{{ trans('sidebar.dashboard') }}</div>
                                </a>
                            </li>

                            @can('employees')
                                <li
                                    class="menu-item {{ request()->is('Workers', 'AddWorker', 'Thanks', 'Penalties', 'Jobleavers', 'Dispatch', 'Certific', 'Holidays', 'Wives', 'Childrens', 'Placements', 'Positions', 'Services', 'Inputs', 'Itypes') ? 'open active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-account-cog-outline'></i>
                                        <span class="menu-title">قسم الموارد البشرية</span>
                                    </a>

                                    <ul class="menu-sub">
                                        @can('workers')
                                            <li Class="menu-item {{ request()->Is('Workers') ? 'active' : '' }}">
                                                <a href="{{ Route('Workers') }}" Class="menu-link">
                                                    <i class=""></i>
                                                    <div>المعلومات العامة</div>
                                                </a>
                                            </li>
                                            <li Class="menu-item {{ request()->Is('AddWorker') ? 'active' : 'hidden' }}">
                                                <a href="{{ Route('AddWorker') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>إضافة موظف</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('wives')
                                            <li Class="menu-item {{ request()->Is('Wives') ? 'active' : '' }}">
                                                <a href="{{ Route('Wives.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>بيانات الزوج/ـة</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('childrens')
                                            <li Class="menu-item {{ request()->Is('Childrens') ? 'active' : '' }}">
                                                <a href="{{ Route('Childrens.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>بيانات الاطفال</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('certific')
                                            <li Class="menu-item {{ request()->Is('Certific') ? 'active' : '' }}">
                                                <a href = "{{ Route('Certific.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الشهادات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('placements')
                                            <li Class="menu-item {{ request()->Is('Placements') ? 'active' : '' }}">
                                                <a href = "{{ Route('Placements.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>التنسيب</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('positions')
                                            <li Class="menu-item {{ request()->Is('Positions') ? 'active' : '' }}">
                                                <a href = "{{ Route('Positions.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>المنصب</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('thanks')
                                            <li Class="menu-item {{ request()->Is('Thanks') ? 'active' : '' }}">
                                                <a href="{{ Route('Thanks.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الشكر و التقدير</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('penalties')
                                            <li Class="menu-item {{ request()->Is('Penalties') ? 'active' : '' }}">
                                                <a href = "{{ Route('Penalties.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>العقوبات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('jobleavers')
                                            <li Class="menu-item {{ request()->Is('Jobleavers') ? 'active' : '' }}">
                                                <a href = "{{ Route('Jobleavers.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>تاركي العمل</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('services')
                                            <li Class="menu-item {{ request()->Is('Services') ? 'active' : '' }}">
                                                <a href = "{{ Route('Services.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>خلاصة الخدمة</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('dispatch')
                                            <li Class="menu-item {{ request()->Is('Dispatch') ? 'active' : '' }}">
                                                <a href = "{{ Route('Dispatch.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الأيفادات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('holidays')
                                            <li Class="menu-item {{ request()->Is('Holidays') ? 'active' : '' }}">
                                                <a href = "{{ Route('Holidays.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الاجازات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('empInfoBank')
                                            <li Class="menu-item {{ request()->Is('EmpInfoBank') ? 'active' : '' }}">
                                                <a href="" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>العلاوات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('empInfoBank')
                                            <li Class="menu-item {{ request()->Is('EmpInfoBank') ? 'active' : '' }}">
                                                <a href="" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الترفيعات</div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('financial')
                                <li
                                    class="menu-item {{ request()->is('Salaries', 'Inputs', 'Itypes', 'Iaccts', 'Idepartments') ? 'open active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-calculator'></i>
                                        <span class="menu-title">القسم المالي</span>
                                    </a>
                                    <ul class="menu-sub">
                                        @can('itypes')
                                            <li Class="menu-item {{ request()->Is('Itypes') ? 'active' : '' }}">
                                                <a href = "{{ Route('Itypes.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>انواع القيود</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('iaccts')
                                            <li Class="menu-item {{ request()->Is('Iaccts') ? 'active' : '' }}">
                                                <a href = "{{ Route('Iaccts.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الدليل المحاسبي</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('idepartments')
                                            <li Class="menu-item {{ request()->Is('Idepartments') ? 'active' : '' }}">
                                                <a href = "{{ Route('Idepartments.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>دليل الاقسام</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('inputs')
                                            <li Class="menu-item {{ request()->Is('Inputs') ? 'active' : '' }}">
                                                <a href = "{{ Route('Inputs.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>ادخال اليومية</div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('landproperty')
                                <li
                                    class="menu-item {{ request()->is('Provinces', 'Plots', 'Show-Plot/*', 'Realities', 'Show-Realitie/*', 'Boycotts', 'Bonds', 'Bond-Show/*', 'Real-Property', 'Show-Real-Property/*', 'Estate') ? 'open active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-map-outline'></i>
                                        <span class="menu-title">قسم الاملاك و الاراضي</span>
                                    </a>
                                    <ul class="menu-sub">
                                        @can('provinces')
                                            <li Class="menu-item {{ request()->Is('Provinces') ? 'active' : '' }}">
                                                <a href = "{{ Route('Provinces.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>المقاطعات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('plots')
                                            <li Class="menu-item {{ request()->Is('Plots') ? 'active' : '' }}">
                                                <a href = "{{ Route('Plots') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>القطع</div>
                                                </a>
                                            </li>

                                            <li Class="menu-item {{ request()->Is('Show-Plot/*') ? 'active' : 'hidden' }}">
                                                <a href = "javascript:void(0)" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>عرض القطعة</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('realities')
                                            <li Class="menu-item {{ request()->Is('Realities') ? 'active' : '' }}">
                                                <a href = "{{ Route('Realities') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>السند العقاري</div>
                                                </a>
                                            </li>

                                            <li Class="menu-item {{ request()->Is('Show-Realitie/*') ? 'active' : 'hidden' }}">
                                                <a href = "javascript:void(0)" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>عرض السند العقاري</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('realProperty')
                                            <li Class="menu-item {{ request()->Is('Real-Property') ? 'active' : '' }}">
                                                <a href = "{{ Route('RealProperty') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الاملاك</div>
                                                </a>
                                            </li>

                                            <li Class="menu-item {{ request()->Is('Show-Real-Property/*') ? 'active' : 'hidden' }}">
                                                <a href = "#" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>عرض الاملاك</div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('training')
                                <li class="menu-item {{ request()->is('Coaches', 'Courses') ? 'open active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-account-tie-voice-outline'></i>
                                        <span class="menu-title">التدريب و التطوير</span>
                                    </a>
                                    <ul class="menu-sub">
                                        @can('coaches')
                                            <li Class="menu-item {{ request()->Is('Coaches') ? 'active' : '' }}">
                                                <a href = "{{ Route('Coaches.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>المدربين</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('courses')
                                            <li Class="menu-item {{ request()->Is('Courses') ? 'active' : '' }}">
                                                <a href = "{{ Route('Courses.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الدورات</div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            @can('files')
                                {{-- Files Upload --}}
                                <li class="menu-item {{ request()->is('Private-Employee-Files') ? 'active' : '' }}">
                                    <a href="{{ Route('PrivateEmployeeFiles') }}" class="menu-link">
                                        <i class="menu-icon tf-icons mdi mdi-file-cloud-outline"></i>
                                        <div>{{ trans('sidebar.PrivateEmployeeFiles') }}</div>
                                    </a>
                                </li>
                            @endcan
                            @can('settings')
                                {{-- الإعدادات --}}
                                <li
                                    class="menu-item {{ request()->is('Governorates', 'Districts', 'Areas', 'Infooffice', 'Linkages', 'Sections', 'Branch', 'Units', 'Certificates', 'Graduations', 'Specializations', 'Specialtys', 'Precises', 'Grades', 'Jobtitles', 'Scalems', 'Technicians', 'Scaleas', 'Trainings', 'Typeholidays', 'Specializationclassification', 'Typesservices', 'Department', 'Emaillists', 'Utilizationtypes', 'Propertycategory', 'Propertytypes', 'Tracking') ? 'open active' : '' }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-cog-outline'></i>
                                        <span class="menu-title">الاعدادات</span>
                                    </a>
                                    <ul class="menu-sub">
                                        @can('governorates')
                                            {{-- المحافظات --}}
                                            <li class="menu-item {{ request()->is('Governorates') ? 'active' : '' }}">
                                                <a href="{{ Route('Governorates.index') }}" Class="menu-link">
                                                    <i class=""></i>
                                                    <div>المحافظات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('districts')
                                            {{-- الأقضية --}}
                                            <li class="menu-item {{ request()->Is('Districts') ? 'active' : '' }}">
                                                <a href="{{ Route('Districts.index') }}" Class="menu-link">
                                                    <i class=""></i>
                                                    <div>الأقضية</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('areas')
                                            {{-- النواحي --}}
                                            <li class="menu-item {{ request()->Is('Areas') ? 'active' : '' }}">
                                                <a href="{{ Route('Areas.index') }}" Class="menu-link">
                                                    <i class=""></i>
                                                    <div>النواحي</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('infooffice')
                                            {{-- مكتب المعلومات --}}
                                            <li Class="menu-item {{ request()->Is('Infooffice') ? 'active' : '' }}">
                                                <a href="{{ Route('Infooffice.index') }}" Class="menu-link">
                                                    <i class=""></i>
                                                    <div>مكتب المعلومات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('linkages')
                                            {{-- الارتباط --}}
                                            <li Class="menu-item {{ request()->Is('Linkages') ? 'active' : '' }}">
                                                <a href="{{ Route('Linkages.index') }}" Class="menu-link">
                                                    <i class=""></i>
                                                    <div>الارتباط</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('sections')
                                            {{-- الاقسام --}}
                                            <li Class="menu-item {{ request()->Is('Sections') ? 'active' : '' }}">
                                                <a href="{{ Route('Sections.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الاقسام</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('branch')
                                            {{-- الشعب --}}
                                            <li Class="menu-item {{ request()->Is('Branch') ? 'active' : '' }}">
                                                <a href="{{ Route('Branch.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الشعب</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('units')
                                            {{-- الوحدات --}}
                                            <li Class="menu-item {{ request()->Is('Units') ? 'active' : '' }}">
                                                <a href="{{ Route('Units.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الوحدات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('department')
                                            {{-- الدوائر --}}
                                            <li Class="menu-item {{ request()->Is('Department') ? 'active' : '' }}">
                                                <a href="{{ Route('Department.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الدوائر</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('certificates')
                                            {{-- الشهادة --}}
                                            <li Class="menu-item {{ request()->Is('Certificates') ? 'active' : '' }}">
                                                <a href="{{ Route('Certificates.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الشهادة</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('graduations')
                                            {{-- جهة التخرج --}}
                                            <li Class="menu-item {{ request()->Is('Graduations') ? 'active' : '' }}">
                                                <a href="{{ Route('Graduations.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>جهة التخرج</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('specializations')
                                            {{-- الاختصاص --}}
                                            <li Class="menu-item {{ request()->Is('Specializations') ? 'active' : '' }}">
                                                <a href="{{ Route('Specializations.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الاختصاص</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('specialtys')
                                            {{-- التخصص العام --}}
                                            <li Class="menu-item {{ request()->Is('Specialtys') ? 'active' : '' }}">
                                                <a href="{{ Route('Specialtys.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>التخصص العام</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('precises')
                                            {{-- التخصص الدقيق --}}
                                            <li Class="menu-item {{ request()->Is('Precises') ? 'active' : '' }}">
                                                <a href="{{ Route('Precises.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>التخصص الدقيق</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('specializationclassification')
                                            {{-- تصنيف التخصص --}}
                                            <li Class="menu-item {{ request()->Is('Specializationclassification') ? 'active' : '' }}">
                                                <a href="{{ Route('Specializationclassification.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>تصنيف التخصص</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('grades')
                                            {{-- الدرجات --}}
                                            <li Class="menu-item {{ request()->Is('Grades') ? 'active' : '' }}">
                                                <a href="{{ Route('Grades.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>الدرجات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('jobtitles')
                                            {{-- العنوان الوظيفي --}}
                                            <li Class="menu-item {{ request()->Is('Jobtitles') ? 'active' : '' }}">
                                                <a href="{{ Route('Jobtitles.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>العنوان الوظيفي</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('scalems')
                                            {{-- سلم رواتب الملاك --}}
                                            <li Class="menu-item {{ request()->Is('Scalems') ? 'active' : '' }}">
                                                <a href="{{ Route('Scalems.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>سلم رواتب الملاك</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('scaleas')
                                            {{-- سلم رواتب العقد الاداري --}}
                                            <li Class="menu-item {{ request()->Is('Scaleas') ? 'active' : '' }}">
                                                <a href="{{ Route('Scaleas.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>سلم رواتب العقد الاداري</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('technicians')
                                            {{-- سلم رواتب العقد الفني --}}
                                            <li Class="menu-item {{ request()->Is('Technicians') ? 'active' : '' }}">
                                                <a href="{{ Route('Technicians.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>سلم رواتب العقد الفني</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('trainings')
                                            {{-- مجال التدريب --}}
                                            <li Class="menu-item {{ request()->Is('Trainings') ? 'active' : '' }}">
                                                <a href="{{ Route('Trainings.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>مجال التدريب</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('typeholidays')
                                            {{-- نوع الاجازة --}}
                                            <li Class="menu-item {{ request()->Is('Typeholidays') ? 'active' : '' }}">
                                                <a href="{{ Route('Typeholidays.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>نوع الاجازة</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('typesservices')
                                            {{-- حالة الخدمة --}}
                                            <li Class="menu-item {{ request()->Is('Typesservices') ? 'active' : '' }}">
                                                <a href="{{ Route('Typesservices.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>حالة الخدمة</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('emaillists')
                                            {{-- البريد الالكتروني --}}
                                            <li Class="menu-item {{ request()->Is('Emaillists') ? 'active' : '' }}">
                                                <a href="{{ Route('Emaillists.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>البريد الألكتروني</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('propertycategory')
                                            {{-- انواع العقارات --}}
                                            <li Class="menu-item {{ request()->Is('Propertycategory') ? 'active' : '' }}">
                                                <a href="{{ Route('Propertycategory.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>انواع العقارات</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('utilizationtypes')
                                            {{-- انواع الاستغلال للعقار --}}
                                            <li Class="menu-item {{ request()->Is('Utilizationtypes') ? 'active' : '' }}">
                                                <a href="{{ Route('Utilizationtypes.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>انواع الاستغلال للعقار</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('propertytypes')
                                            {{-- جنس العقار --}}
                                            <li Class="menu-item {{ request()->Is('Propertytypes') ? 'active' : '' }}">
                                                <a href="{{ Route('Propertytypes.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>جنس العقار</div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('tracking')
                                            {{-- التتبع --}}
                                            <li Class="menu-item {{ request()->Is('Tracking') ? 'active' : '' }}">
                                                <a href="{{ Route('Tracking.index') }}" Class="menu-link">
                                                    <i Class=""></i>
                                                    <div>التتبع</div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            {{-- المستخدمين --}}
                            @can('users')
                                <li
                                    class="menu-item {{ request()->is('Administrators-Accounts') ? 'active open' : (request()->is('Customers-Accounts') ? 'active open' : '') }}">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-account-outline'></i>
                                        <span class="menu-title">{{ trans('sidebar.Users accounts') }}</span>
                                    </a>
                                    <ul class="menu-sub">
                                        @role(['OWNER', 'Administrator', 'Supervisor'])
                                            <li class="menu-item {{ request()->is('Administrators-Accounts') ? 'active' : '' }}">
                                                <a href="{{ Route('Administrators-Accounts.index') }}" class="menu-link">
                                                    <i class=""></i>
                                                    <div>{{ trans('sidebar.Admin accounts') }}</div>
                                                </a>
                                            </li>
                                        @endrole
                                        <li class="menu-item {{ request()->is('Customers-Accounts') ? 'active' : '' }}">
                                            <a href="{{ Route('Customers-Accounts.index') }}" class="menu-link">
                                                <i class=""></i>
                                                <div>{{ trans('sidebar.Customer accounts') }}</div>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endcan

                            {{-- التصاريح والأدوار --}}
                            @if (Auth::check())
                                @can('permissions-roles')
                                    <li
                                        class="menu-item {{ request()->is('Permissions&Roles/Account-Permissions') ? 'active open' : (request()->is('Permissions&Roles/Account-Roles') ? 'active open' : '') }}">
                                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                                            <i class='menu-icon tf-icons mdi mdi-shield-account'></i>
                                            <span class="menu-title">{{ trans('sidebar.Permissions and roles') }}</span>
                                        </a>
                                        <ul class="menu-sub">
                                            @can('permissions')
                                                <li
                                                    class="menu-item {{ request()->is('Permissions&Roles/Account-Permissions') ? 'active' : '' }}">
                                                    <a href="{{ Route('Account-Permissions.index') }}" class="menu-link">
                                                        <i class=""></i>
                                                        <div>{{ trans('sidebar.Permissions') }}</div>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('roles')
                                                <li
                                                    class="menu-item {{ request()->is('Permissions&Roles/Account-Roles') ? 'active' : '' }}">
                                                    <a href="{{ Route('Account-Roles.index') }}" class="menu-link">
                                                        <i class=""></i>
                                                        <div>{{ trans('sidebar.Roles') }}</div>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                @endcan
                            @endif
                        </ul>
                    </aside>
                @endrole
            @endif

            <!-- Layout page -->
            <div class="layout-page">

                {{-- Below commented code read by artisan command while installing jetstream. !! Do not remove if you want
            to use jetstream. --}}
                {{--
            <x-banner /> --}}

                <!-- BEGIN: Navbar-->
                @if ($isNavbar)
                    @include('layouts/sections/navbar/navbar')
                @endif
                <!-- END: Navbar-->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @if ($isFlex)
                        <div class="{{ $container }} d-flex align-items-stretch flex-grow-1 p-0">
                        @else
                            <div class="{{ $container }} flex-grow-1 container-p-y">
                    @endif

                    @yield('content')

                    <!-- pricingModal -->
                    @if ($pricingModal)
                        @include('_partials/_modals/modal-pricing')
                    @endif
                    <!--/ pricingModal -->

                </div>
                <!-- / Content -->

                <!-- Footer -->
                @if ($isFooter)
                    @include('layouts/sections/footer/footer')
                @endif
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    @if ($isMenu)
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    @endif
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection
