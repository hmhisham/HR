@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
$configData = Helper::appClasses();
@endphp

<!-- تصميم احترافي عصري مع الألوان البيضاء -->
<style>
  /* متغيرات الألوان العصرية */
  :root {
    --primary-white: #ffffff;
    --soft-white: #fafafa;
    --light-gray: #f8f9fa;
    --border-light: #e9ecef;
    --text-primary: #2c3e50;
    --text-secondary: #6c757d;
    --accent-blue: #3498db;
    --accent-hover: #2980b9;
    --shadow-soft: 0 2px 10px rgba(0, 0, 0, 0.08);
    --shadow-medium: 0 4px 20px rgba(0, 0, 0, 0.12);
    --shadow-strong: 0 8px 30px rgba(0, 0, 0, 0.15);
    --border-radius: 16px;
    --border-radius-small: 8px;
    --transition-smooth: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    --transition-bounce: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    --gradient-subtle: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    --gradient-accent: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
  }

  /* تصميم القائمة الجانبية العصري */
  .layout-menu {
    background: var(--primary-white);
    box-shadow: var(--shadow-medium);
    border-radius: 0 var(--border-radius) var(--border-radius) 0;
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
    border-right: 1px solid var(--border-light);
  }

  /* تأثير الإضاءة الخفيفة */
  .layout-menu::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--gradient-subtle);
    opacity: 0.5;
    z-index: 0;
  }

  /* منطقة الشعار العصرية */
  .app-brand {
    transition: var(--transition-bounce);
    position: relative;
    margin: 20px auto;
    padding: 40px 20px !important;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    z-index: 2;
    background: var(--primary-white);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-soft);
    margin-bottom: 30px;
  }

  /* حاوي الشعار المحسن */
  .logo-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 280px;
    height: auto;
    min-height: 120px;
    margin: 0 auto;
    overflow: visible;
    text-align: center;
    background: var(--primary-white);
    border-radius: var(--border-radius-small);
    padding: 20px;
  }

  /* تأثير الإضاءة خلف الشعار */
  .logo-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(52, 152, 219, 0.1) 0%, rgba(52, 152, 219, 0.05) 40%, transparent 70%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    animation: logoGlow 6s ease-in-out infinite;
    z-index: 0;
  }

  @keyframes logoGlow {
    0%, 100% {
      transform: translate(-50%, -50%) scale(0.9);
      opacity: 0.3;
    }
    50% {
      transform: translate(-50%, -50%) scale(1.1);
      opacity: 0.6;
    }
  }

  /* تصميم صورة الشعار */
  .logo-image {
    width: 85% !important;
    height: auto !important;
    max-width: 240px !important;
    max-height: 100px !important;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    transition: var(--transition-bounce);
    position: relative;
    z-index: 2;
    border-radius: var(--border-radius-small);
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
  }

  .logo-image:hover {
    transform: scale(1.05);
    filter: drop-shadow(0 4px 12px rgba(52, 152, 219, 0.2));
  }

  /* تصميم المحتوى الداخلي للقائمة */
  .menu-inner {
    padding: 20px 0;
    position: relative;
    z-index: 2;
    background: transparent;
  }

  /* تصميم عناصر القائمة العصري */
  .menu-vertical .menu-item .menu-link {
    padding: 14px 20px;
    margin: 6px 16px;
    border-radius: var(--border-radius-small);
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
    background: var(--primary-white);
    border: 1px solid var(--border-light);
    box-shadow: var(--shadow-soft);
  }

  /* تأثير التحويم المحسن */
  .menu-item:hover .menu-link {
    background: var(--gradient-accent);
    transform: translateX(8px) scale(1.02);
    box-shadow: var(--shadow-medium);
    border-color: var(--accent-blue);
  }

  /* تأثير الضغط */
  .menu-item:active .menu-link {
    transform: translateX(8px) scale(0.98);
    transition: transform 0.1s ease;
  }

  /* تصميم الأيقونات العصري */
  .menu-icon {
    font-size: 20px;
    margin-left: 12px;
    transition: var(--transition-bounce);
    position: relative;
    z-index: 2;
    color: var(--text-primary);
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* تأثير الأيقونات عند التحويم */
  .menu-item:hover .menu-icon {
    transform: scale(1.2) rotate(5deg);
    color: var(--primary-white);
    text-shadow: 0 2px 8px rgba(255, 255, 255, 0.3);
  }

  /* تصميم النصوص العصري */
  .menu-link div,
  .menu-title {
    font-family: 'Cairo', 'Segoe UI', 'Roboto', sans-serif;
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 0.3px;
    position: relative;
    z-index: 2;
    color: var(--text-primary);
    transition: var(--transition-smooth);
    line-height: 1.4;
  }

  .menu-item:hover .menu-link div,
  .menu-item:hover .menu-title {
    color: var(--text-secondary);
    font-weight: 600;
  }

  /* تصميم القوائم الفرعية العصري */
  .menu-sub {
    background: var(--light-gray);
    border-radius: var(--border-radius-small);
    margin: 8px 0;
    padding: 12px 0;
    animation: slideDown 0.4s ease;
    border: 1px solid var(--border-light);
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-10px);
      max-height: 0;
    }
    to {
      opacity: 1;
      transform: translateY(0);
      max-height: 500px;
    }
  }

  /* عناصر القائمة الفرعية */
  .menu-sub .menu-item .menu-link {
    margin: 4px 20px;
    padding: 10px 16px;
    background: var(--primary-white);
    font-size: 13px;
    border-radius: var(--border-radius-small);
  }

  .menu-sub .menu-item:hover .menu-link {
    background: var(--accent-blue);
    transform: translateX(6px);
    color: var(--primary-white);
  }

  /* تصميم زر التبديل */
  .menu-toggle::after {
    content: '▼';
    float: left;
    transition: var(--transition-smooth);
    margin-right: 8px;
    font-size: 10px;
    color: var(--text-secondary);
  }

  .menu-item.open .menu-toggle::after {
    transform: rotate(180deg);
    color: var(--accent-blue);
  }

  /* العنصر النشط */
  .menu-item.active .menu-link {
    background: var(--gradient-accent);
    box-shadow: var(--shadow-medium);
    border-color: var(--accent-blue);
    transform: translateX(8px);
  }

  .menu-item.active .menu-link div,
  .menu-item.active .menu-title,
  .menu-item.active .menu-icon {
    color: var(--primary-white);
  }

  /* تأثير التحويم على القائمة */
  .layout-menu:hover {
    box-shadow: var(--shadow-strong);
    transform: translateX(2px);
  }

  /* تصميم شريط التمرير العصري */
  .menu-inner {
    scrollbar-width: thin;
    scrollbar-color: var(--accent-blue) transparent;
  }

  .menu-inner::-webkit-scrollbar {
    width: 6px;
  }

  .menu-inner::-webkit-scrollbar-track {
    background: var(--light-gray);
    border-radius: 3px;
  }

  .menu-inner::-webkit-scrollbar-thumb {
    background: var(--accent-blue);
    border-radius: 3px;
    transition: var(--transition-smooth);
  }

  .menu-inner::-webkit-scrollbar-thumb:hover {
    background: var(--accent-hover);
  }

  /* تأثيرات الاستجابة */
  @media (max-width: 768px) {
    .logo-container {
      max-width: 240px;
      min-height: 100px;
      padding: 15px;
    }

    .logo-image {
      max-width: 200px !important;
      max-height: 80px !important;
    }

    .menu-icon {
      font-size: 18px;
    }

    .app-brand {
      padding: 30px 15px !important;
      margin-bottom: 20px;
    }
  }

  @media (min-width: 769px) and (max-width: 1199px) {
    .logo-container {
      max-width: 260px;
      min-height: 110px;
    }

    .logo-image {
      max-width: 220px !important;
      max-height: 90px !important;
    }
  }

  /* تأثيرات الظهور المتدرج */
  .menu-item {
    animation: fadeInLeft 0.6s ease forwards;
    opacity: 0;
  }

  .menu-item:nth-child(1) { animation-delay: 0.1s; }
  .menu-item:nth-child(2) { animation-delay: 0.15s; }
  .menu-item:nth-child(3) { animation-delay: 0.2s; }
  .menu-item:nth-child(4) { animation-delay: 0.25s; }
  .menu-item:nth-child(5) { animation-delay: 0.3s; }
  .menu-item:nth-child(6) { animation-delay: 0.35s; }
  .menu-item:nth-child(7) { animation-delay: 0.4s; }
  .menu-item:nth-child(8) { animation-delay: 0.45s; }

  @keyframes fadeInLeft {
    from {
      opacity: 0;
      transform: translateX(-20px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  /* تحسين الخطوط العربية */
  * {
    font-family: 'Cairo', 'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif;
  }

  /* تأثير التركيز المحسن */
  .menu-link:focus {
    outline: 2px solid var(--accent-blue);
    outline-offset: 2px;
    background: var(--light-gray);
  }

  /* تصميم زر تبديل القائمة */
  .layout-menu-toggle {
    transition: var(--transition-bounce);
    color: var(--text-primary) !important;
    background: var(--primary-white);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-soft);
  }

  .layout-menu-toggle:hover {
    transform: scale(1.1) rotate(180deg);
    color: var(--accent-blue) !important;
    box-shadow: var(--shadow-medium);
  }

  /* تحسينات إضافية للتصميم العصري */
  .layout-wrapper {
    background: var(--soft-white);
  }

  .layout-container {
    background: var(--soft-white);
  }

  /* تأثير الانتقال السلس للصفحة */
  .layout-page {
    transition: var(--transition-smooth);
  }

  /* تحسين المظهر العام */
  body {
    background: var(--soft-white);
    color: var(--text-primary);
  }
</style>

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

/* Content classes */
$container = $container ?? 'container-xxl';
@endphp

@section('layoutContent')
<div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }}">
  <div class="layout-container">

    @if ($isMenu)
    @role(['OWNER', 'Administrator', 'Supervisor', 'Employee'])
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link d-flex flex-column align-items-center text-decoration-none" style="width: 100%; display: flex; justify-content: center; align-items: center;">
          <div class="logo-container">
            <div class="logo-glow"></div>
            <span class="app-brand-logo demo">
              <img src="{{ asset('assets/img/logo/GCPI.png') }}" class="logo-image" alt="شعار النظام">
            </span>
          </div>
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

        @can('landproperty')
        <li class="menu-item {{ request()->is('Provinces', 'Plots', 'Show-Plot/*', 'Realities', 'Show-Realitie/*', 'Boycotts', 'Bonds', 'Bond-Show/*', 'Real-Property', 'Show-Real-Property/*', 'Estate' ,'Propertyfolder') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-map-outline'></i>
            <span class="menu-title">الاملاك و الاراضي</span>
          </a>
          <ul class="menu-sub">
            @can('provinces')
            <li class="menu-item {{ request()->Is('Provinces') ? 'active' : '' }}">
              <a href="{{ Route('Provinces.index') }}" class="menu-link">
                <i class=""></i>
                <div>المقاطعات</div>
              </a>
            </li>
            @endcan
            @can('plots')
            <li class="menu-item {{ request()->Is('Plots') ? 'active' : '' }}">
              <a href="{{ Route('Plots') }}" class="menu-link">
                <i class=""></i>
                <div>القطع</div>
              </a>
            </li>

            <li class="menu-item {{ request()->Is('Show-Plot/*') ? 'active' : 'hidden' }}">
              <a href="javascript:void(0)" class="menu-link">
                <i class=""></i>
                <div>عرض القطعة</div>
              </a>
            </li>
            @endcan
            @can('realities')
            <li class="menu-item {{ request()->Is('Realities') ? 'active' : '' }}">
              <a href="{{ Route('Realities') }}" class="menu-link">
                <i class=""></i>
                <div>السند العقاري</div>
              </a>
            </li>

            <li class="menu-item {{ request()->Is('Show-Realitie/*') ? 'active' : 'hidden' }}">
              <a href="javascript:void(0)" class="menu-link">
                <i class=""></i>
                <div>عرض السند العقاري</div>
              </a>
            </li>
            @endcan
            @can('realProperty')
            <li class="menu-item {{ request()->Is('Real-Property') ? 'active' : '' }}">
              <a href="{{ Route('RealProperty') }}" class="menu-link">
                <i class=""></i>
                <div>الاسكان</div>
              </a>
            </li>

            <li class="menu-item {{ request()->Is('Show-Real-Property/*') ? 'active' : 'hidden' }}">
              <a href="#" class="menu-link">
                <i class=""></i>
                <div>عرض الاسكان</div>
              </a>
            </li>

            <li class="menu-item {{ request()->Is('Propertyfolder') ? 'active' : '' }}">
              <a href="{{ Route('Propertyfolder.index') }}" class="menu-link">
                <div>اضبارة العقار</div>
              </a>
            </li>

            @endcan
          </ul>
        </li>
        @endcan

        @can('settings')
        {{-- الإعدادات --}}
        <li class="menu-item {{ request()->is('Governorates', 'Districts', 'Areas', 'Infooffice', 'Linkages', 'Sections', 'Branch', 'Units', 'Certificates', 'Graduations', 'Specializations', 'Specialtys', 'Precises', 'Grades', 'Jobtitles', 'Scalems', 'Technicians', 'Scaleas', 'Trainings', 'Typeholidays', 'Specializationclassification', 'Typesservices', 'Department', 'Emaillists', 'Utilizationtypes', 'Propertycategory', 'Propertytypes', 'Tracking', 'backup', 'employees', 'Propertylocation', 'propertytyperented') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-cog-outline'></i>
            <span class="menu-title">الاعدادات</span>
          </a>
          <ul class="menu-sub">
            @can('governorates')
            {{-- المحافظات --}}
            <li class="menu-item {{ request()->is('Governorates') ? 'active' : '' }}">
              <a href="{{ Route('Governorates.index') }}" class="menu-link">
                <i class=""></i>
                <div>المحافظات</div>
              </a>
            </li>
            @endcan
            @can('districts')
            {{-- الأقضية --}}
            <li class="menu-item {{ request()->Is('Districts') ? 'active' : '' }}">
              <a href="{{ Route('Districts.index') }}" class="menu-link">
                <i class=""></i>
                <div>الأقضية</div>
              </a>
            </li>
            @endcan
            @can('areas')
            {{-- النواحي --}}
            <li class="menu-item {{ request()->Is('Areas') ? 'active' : '' }}">
              <a href="{{ Route('Areas.index') }}" class="menu-link">
                <i class=""></i>
                <div>النواحي</div>
              </a>
            </li>
            @endcan
            @can('infooffice')
            {{-- مكتب المعلومات --}}
            <li class="menu-item {{ request()->Is('Infooffice') ? 'active' : '' }}">
              <a href="{{ Route('Infooffice.index') }}" class="menu-link">
                <i class=""></i>
                <div>مكتب المعلومات</div>
              </a>
            </li>
            @endcan
            @can('linkages')
            {{-- الارتباط --}}
            <li class="menu-item {{ request()->Is('Linkages') ? 'active' : '' }}">
              <a href="{{ Route('Linkages.index') }}" class="menu-link">
                <i class=""></i>
                <div>الارتباط</div>
              </a>
            </li>
            @endcan
            @can('sections')
            {{-- الاقسام --}}
            <li class="menu-item {{ request()->Is('Sections') ? 'active' : '' }}">
              <a href="{{ Route('Sections.index') }}" class="menu-link">
                <i class=""></i>
                <div>الاقسام</div>
              </a>
            </li>
            @endcan
            @can('branch')
            {{-- الشعب --}}
            <li class="menu-item {{ request()->Is('Branch') ? 'active' : '' }}">
              <a href="{{ Route('Branch.index') }}" class="menu-link">
                <i class=""></i>
                <div>الشعب</div>
              </a>
            </li>
            @endcan
            @can('units')
            {{-- الوحدات --}}
            <li class="menu-item {{ request()->Is('Units') ? 'active' : '' }}">
              <a href="{{ Route('Units.index') }}" class="menu-link">
                <i class=""></i>
                <div>الوحدات</div>
              </a>
            </li>
            @endcan
            @can('department')
            {{-- الدوائر --}}
            <li class="menu-item {{ request()->Is('Department') ? 'active' : '' }}">
              <a href="{{ Route('Department.index') }}" class="menu-link">
                <i class=""></i>
                <div>الدوائر</div>
              </a>
            </li>
            @endcan
            @can('certificates')
            {{-- الشهادة --}}
            <li class="menu-item {{ request()->Is('Certificates') ? 'active' : '' }}">
              <a href="{{ Route('Certificates.index') }}" class="menu-link">
                <i class=""></i>
                <div>الشهادة</div>
              </a>
            </li>
            @endcan
            @can('graduations')
            {{-- جهة التخرج --}}
            <li class="menu-item {{ request()->Is('Graduations') ? 'active' : '' }}">
              <a href="{{ Route('Graduations.index') }}" class="menu-link">
                <i class=""></i>
                <div>جهة التخرج</div>
              </a>
            </li>
            @endcan
            @can('specializations')
            {{-- الاختصاص --}}
            <li class="menu-item {{ request()->Is('Specializations') ? 'active' : '' }}">
              <a href="{{ Route('Specializations.index') }}" class="menu-link">
                <i class=""></i>
                <div>الاختصاص</div>
              </a>
            </li>
            @endcan
            @can('specialtys')
            {{-- التخصص العام --}}
            <li class="menu-item {{ request()->Is('Specialtys') ? 'active' : '' }}">
              <a href="{{ Route('Specialtys.index') }}" class="menu-link">
                <i class=""></i>
                <div>التخصص العام</div>
              </a>
            </li>
            @endcan
            @can('precises')
            {{-- التخصص الدقيق --}}
            <li class="menu-item {{ request()->Is('Precises') ? 'active' : '' }}">
              <a href="{{ Route('Precises.index') }}" class="menu-link">
                <i class=""></i>
                <div>التخصص الدقيق</div>
              </a>
            </li>
            @endcan
            @can('specializationclassification')
            {{-- تصنيف التخصص --}}
            <li class="menu-item {{ request()->Is('Specializationclassification') ? 'active' : '' }}">
              <a href="{{ Route('Specializationclassification.index') }}" class="menu-link">
                <i class=""></i>
                <div>تصنيف التخصص</div>
              </a>
            </li>
            @endcan
            @can('grades')
            {{-- الدرجات --}}
            <li class="menu-item {{ request()->Is('Grades') ? 'active' : '' }}">
              <a href="{{ Route('Grades.index') }}" class="menu-link">
                <i class=""></i>
                <div>الدرجات</div>
              </a>
            </li>
            @endcan
            @can('jobtitles')
            {{-- العنوان الوظيفي --}}
            <li class="menu-item {{ request()->Is('Jobtitles') ? 'active' : '' }}">
              <a href="{{ Route('Jobtitles.index') }}" class="menu-link">
                <i class=""></i>
                <div>العنوان الوظيفي</div>
              </a>
            </li>
            @endcan
            @can('scalems')
            {{-- سلم رواتب الملاك --}}
            <li class="menu-item {{ request()->Is('Scalems') ? 'active' : '' }}">
              <a href="{{ Route('Scalems.index') }}" class="menu-link">
                <i class=""></i>
                <div>سلم رواتب الملاك</div>
              </a>
            </li>
            @endcan
            @can('scaleas')
            {{-- سلم رواتب العقد الاداري --}}
            <li class="menu-item {{ request()->Is('Scaleas') ? 'active' : '' }}">
              <a href="{{ Route('Scaleas.index') }}" class="menu-link">
                <i class=""></i>
                <div>سلم رواتب العقد الاداري</div>
              </a>
            </li>
            @endcan
            @can('technicians')
            {{-- سلم رواتب العقد الفني --}}
            <li class="menu-item {{ request()->Is('Technicians') ? 'active' : '' }}">
              <a href="{{ Route('Technicians.index') }}" class="menu-link">
                <i class=""></i>
                <div>سلم رواتب العقد الفني</div>
              </a>
            </li>
            @endcan
            @can('trainings')
            {{-- مجال التدريب --}}
            <li class="menu-item {{ request()->Is('Trainings') ? 'active' : '' }}">
              <a href="{{ Route('Trainings.index') }}" class="menu-link">
                <i class=""></i>
                <div>مجال التدريب</div>
              </a>
            </li>
            @endcan
            @can('typeholidays')
            {{-- نوع الاجازة --}}
            <li class="menu-item {{ request()->Is('Typeholidays') ? 'active' : '' }}">
              <a href="{{ Route('Typeholidays.index') }}" class="menu-link">
                <i class=""></i>
                <div>نوع الاجازة</div>
              </a>
            </li>
            @endcan
            @can('typesservices')
            {{-- حالة الخدمة --}}
            <li class="menu-item {{ request()->Is('Typesservices') ? 'active' : '' }}">
              <a href="{{ Route('Typesservices.index') }}" class="menu-link">
                <i class=""></i>
                <div>حالة الخدمة</div>
              </a>
            </li>
            @endcan
            @can('emaillists')
            {{-- البريد الالكتروني --}}
            <li class="menu-item {{ request()->Is('Emaillists') ? 'active' : '' }}">
              <a href="{{ Route('Emaillists.index') }}" class="menu-link">
                <i class=""></i>
                <div>البريد الألكتروني</div>
              </a>
            </li>
            @endcan
            @can('propertycategory')
            {{-- انواع العقارات --}}
            <li class="menu-item {{ request()->Is('Propertycategory') ? 'active' : '' }}">
              <a href="{{ Route('Propertycategory.index') }}" class="menu-link">
                <i class=""></i>
                <div>انواع العقارات</div>
              </a>
            </li>
            @endcan
            @can('utilizationtypes')
            {{-- انواع الاستغلال للعقار --}}
            <li class="menu-item {{ request()->Is('Utilizationtypes') ? 'active' : '' }}">
              <a href="{{ Route('Utilizationtypes.index') }}" class="menu-link">
                <i class=""></i>
                <div>انواع الاستغلال للعقار</div>
              </a>
            </li>
            @endcan
            @can('propertytypes')
            {{-- جنس العقار --}}
            <li class="menu-item {{ request()->Is('Propertytypes') ? 'active' : '' }}">
              <a href="{{ Route('Propertytypes.index') }}" class="menu-link">
                <i class=""></i>
                <div>جنس العقار</div>
              </a>
            </li>
            @endcan

            {{-- =================نافذة تاجير العقارات================== --}}

            @can('propertylocation')
            {{-- موقع العقار --}}
            <li class="menu-item {{ request()->Is('Propertylocation') ? 'active' : '' }}">
              <a href="{{ Route('Propertylocation.index') }}" class="menu-link">
                <div>موقع العقار</div>
              </a>
            </li>
            @endcan
            @can('propertytyperented')
            <li class="menu-item {{ request()->Is('Propertytyperented') ? 'active' : '' }}">
              <a href="{{ Route('Propertytyperented.index') }}" class="menu-link">
                <div>نوع العقار المؤجر</div>
              </a>
            </li>
            @endcan
            @can('descriptionrented')
            <li class="menu-item {{ request()->Is('Descriptionrented') ? 'active' : '' }}">
              <a href="{{ Route('Descriptionrented.index') }}" class="menu-link">
                <div>صفة العقار المؤجر</div>
              </a>
            </li>
            @endcan
            <li class="menu-item {{ request()->Is('Contracts') ? 'active' : '' }}">
              <a href="{{ Route('Contracts.index') }}" class="menu-link">
                <i class='menu-icon tf-icons mdi mdi-account-outline'></i>
                <div>عقد الايجار</div>
              </a>
            </li>
            <li class="menu-item {{ request()->Is('Tenants') ? 'active' : '' }}">
              <a href="{{ Route('Tenants.index') }}" class="menu-link">
                <i class='menu-icon tf-icons mdi mdi-account-outline'></i>
                <div>المستأجر</div>
              </a>
            </li>
            @can('usersapp')
            {{-- مستخدمي التطبيق --}}
            <li class="menu-item {{ request()->Is('Usersapp') ? 'active' : '' }}">
              <a href="{{ Route('Usersapp.index') }}" class="menu-link">
                <i class=""></i>
                <div>مستخدمي التطبيق</div>
              </a>
            </li>
            @endcan

            @can('tracking')
            {{-- التتبع --}}
            <li class="menu-item {{ request()->Is('Tracking') ? 'active' : '' }}">
              <a href="{{ Route('Tracking.index') }}" class="menu-link">
                <i class=""></i>
                <div>التتبع</div>
              </a>
            </li>
            @endcan
            @can('backup')
            {{-- النسخ الاحتياطي --}}
            <li class="menu-item {{ request()->Is('backup') ? 'active' : '' }}">
              <a href="{{ Route('backup') }}" class="menu-link">
                <i class=""></i>
                <div>النسخ الاحتياطي</div>
              </a>
            </li>
            @endcan
            @can('employees')
            <li class="menu-item {{ request()->Is('employees') ? 'active' : '' }}">
              <a href="{{ route('employees.index') }}" class="menu-link">
                <i class=""></i>
                <div>Employees</div>
              </a>
            </li>
            @endcan

          </ul>
        </li>
        @endcan

        {{-- المستخدمين --}}
        @can('users')
        <li class="menu-item {{ request()->is('Administrators-Accounts') ? 'active open' : (request()->is('Customers-Accounts') ? 'active open' : '') }}">
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
        <li class="menu-item {{ request()->is('Permissions&Roles/Account-Permissions') ? 'active open' : (request()->is('Permissions&Roles/Account-Roles') ? 'active open' : '') }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-shield-account'></i>
            <span class="menu-title">{{ trans('sidebar.Permissions and roles') }}</span>
          </a>
          <ul class="menu-sub">
            @can('permissions')
            <li class="menu-item {{ request()->is('Permissions&Roles/Account-Permissions') ? 'active' : '' }}">
              <a href="{{ Route('Account-Permissions.index') }}" class="menu-link">
                <i class=""></i>
                <div>{{ trans('sidebar.Permissions') }}</div>
              </a>
            </li>
            @endcan
            @can('roles')
            <li class="menu-item {{ request()->is('Permissions&Roles/Account-Roles') ? 'active' : '' }}">
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
