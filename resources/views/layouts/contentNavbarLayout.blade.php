@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
$configData = Helper::appClasses();
@endphp

<!-- تصميم عصري كامل باللون الأبيض -->
<style>
  /* نظام ألوان أبيض نقي مع تدرجات رمادية */
  :root {
    --pure-white: #ffffff;
    --snow-white: #fcfcfc;
    --ivory-white: #fffff0;
    --ghost-white: #f8f8ff;
    --alabaster: #f2f0e6;
    --pearl-white: #f8f6f0;
    --text-dark: #2c3e50;
    --text-gray: #6c757d;
    --text-light: #95a5a6;
    --accent-primary: #3498db;
    --accent-secondary: #2980b9;
    --border-ultralight: #f1f3f4;
    --border-light: #e3e8f0;
    --shadow-subtle: 0 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-soft: 0 4px 12px rgba(0, 0, 0, 0.06);
    --shadow-medium: 0 8px 24px rgba(0, 0, 0, 0.08);
    --shadow-strong: 0 12px 36px rgba(0, 0, 0, 0.1);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --transition-fast: all 0.2s ease;
    --transition-normal: all 0.3s ease;
    --transition-slow: all 0.4s ease;
    --gradient-white: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    --gradient-glass: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 249, 250, 0.95) 100%);
  }

  /* إعادة تعيين كاملة للتصميم */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Cairo', 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  /* هيكل الصفحة الرئيسي */
  .layout-wrapper {
    background: var(--pure-white);
    min-height: 100vh;
    position: relative;
  }

  .layout-container {
    background: var(--pure-white);
    display: flex;
    min-height: 100vh;
  }

  /* القائمة الجانبية - تصميم جديد كامل */
  .layout-menu {
    background: var(--pure-white);
    border-right: 1px solid var(--border-ultralight);
    width: 280px;
    position: relative;
    z-index: 1000;
    box-shadow: var(--shadow-soft);
    transition: var(--transition-normal);
    overflow: hidden;
  }

  .layout-menu::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--gradient-glass);
    backdrop-filter: blur(10px);
    z-index: -1;
  }

  /* منطقة الشعار - تصميم جديد */
  .app-brand {
    padding: 2rem 1.5rem !important;
    text-align: center;
    position: relative;
    margin-bottom: 1rem;
    background: var(--pure-white);
    border-bottom: 1px solid var(--border-ultralight);
  }

  .app-brand-link {
    display: block;
    text-decoration: none;
    transition: var(--transition-normal);
  }

  .logo-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    background: var(--pure-white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-subtle);
    border: 1px solid var(--border-ultralight);
    transition: var(--transition-normal);
  }

  .logo-container:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-soft);
    border-color: var(--border-light);
  }

  .logo-image {
    width: 180px !important;
    height: auto !important;
    max-height: 80px !important;
    object-fit: contain;
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
    transition: var(--transition-normal);
  }

  .logo-image:hover {
    transform: scale(1.05);
    filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.15));
  }

  /* محتوى القائمة */
  .menu-inner {
    padding: 1rem 0;
    position: relative;
    z-index: 2;
  }

  .menu-inner-shadow {
    display: none;
  }

  /* عناصر القائمة الرئيسية */
  .menu-vertical .menu-item {
    margin: 0.25rem 1rem;
  }

  .menu-vertical .menu-item .menu-link {
    padding: 1rem 1.25rem;
    border-radius: var(--radius-md);
    background: var(--pure-white);
    border: 1px solid var(--border-ultralight);
    box-shadow: var(--shadow-subtle);
    transition: var(--transition-normal);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    position: relative;
    overflow: hidden;
  }

  .menu-vertical .menu-item .menu-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: var(--accent-primary);
    opacity: 0;
    transition: var(--transition-fast);
  }

  .menu-vertical .menu-item .menu-link:hover {
    background: var(--pure-white);
    border-color: var(--border-light);
    box-shadow: var(--shadow-soft);
    transform: translateX(4px);
  }

  .menu-vertical .menu-item .menu-link:hover::before {
    opacity: 1;
  }

  /* الأيقونات */
  .menu-icon {
    font-size: 1.25rem;
    color: var(--text-gray);
    transition: var(--transition-normal);
    min-width: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .menu-vertical .menu-item .menu-link:hover .menu-icon {
    color: var(--accent-primary);
    transform: scale(1.1);
  }

  /* النصوص */
  .menu-link div,
  .menu-title {
    color: var(--text-dark);
    font-weight: 500;
    font-size: 0.9rem;
    transition: var(--transition-normal);
    flex: 1;
  }

  .menu-vertical .menu-item .menu-link:hover div,
  .menu-vertical .menu-item .menu-link:hover .menu-title {
    color: var(--accent-primary);
  }

  /* القوائم الفرعية */
  .menu-sub {
    background: var(--pure-white);
    border-radius: var(--radius-md);
    margin: 0.5rem 1rem;
    padding: 0.5rem 0;
    border: 1px solid var(--border-ultralight);
    box-shadow: var(--shadow-subtle);
    animation: slideIn 0.3s ease;
  }

  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .menu-sub .menu-item {
    margin: 0.25rem 0.75rem;
  }

  .menu-sub .menu-item .menu-link {
    padding: 0.75rem 1rem;
    background: var(--pure-white);
    border: 1px solid var(--border-ultralight);
    font-size: 0.85rem;
    border-radius: var(--radius-sm);
  }

  .menu-sub .menu-item .menu-link:hover {
    background: var(--pure-white);
    border-color: var(--accent-primary);
    transform: translateX(2px);
  }

  /* زر التبديل */
  .menu-toggle::after {
    content: '›';
    font-size: 1.2rem;
    transition: var(--transition-normal);
    color: var(--text-light);
  }

  .menu-item.open .menu-toggle::after {
    transform: rotate(90deg);
    color: var(--accent-primary);
  }

  /* العنصر النشط */
  .menu-item.active .menu-link {
    background: var(--pure-white);
    border-color: var(--accent-primary);
    box-shadow: var(--shadow-soft);
  }

  .menu-item.active .menu-link::before {
    opacity: 1;
  }

  .menu-item.active .menu-link div,
  .menu-item.active .menu-title,
  .menu-item.active .menu-icon {
    color: var(--accent-primary);
  }

  /* شريط التمرير */
  .menu-inner::-webkit-scrollbar {
    width: 4px;
  }

  .menu-inner::-webkit-scrollbar-track {
    background: var(--border-ultralight);
    border-radius: 2px;
  }

  .menu-inner::-webkit-scrollbar-thumb {
    background: var(--text-light);
    border-radius: 2px;
    transition: var(--transition-fast);
  }

  .menu-inner::-webkit-scrollbar-thumb:hover {
    background: var(--text-gray);
  }

  /* تأثيرات الظهور */
  .menu-item {
    animation: fadeInUp 0.4s ease forwards;
    opacity: 0;
    transform: translateY(10px);
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .menu-item:nth-child(1) { animation-delay: 0.1s; }
  .menu-item:nth-child(2) { animation-delay: 0.15s; }
  .menu-item:nth-child(3) { animation-delay: 0.2s; }
  .menu-item:nth-child(4) { animation-delay: 0.25s; }
  .menu-item:nth-child(5) { animation-delay: 0.3s; }
  .menu-item:nth-child(6) { animation-delay: 0.35s; }
  .menu-item:nth-child(7) { animation-delay: 0.4s; }
  .menu-item:nth-child(8) { animation-delay: 0.45s; }

  /* استجابة للشاشات الصغيرة */
  @media (max-width: 768px) {
    .layout-menu {
      width: 250px;
    }

    .logo-container {
      padding: 1rem;
    }

    .logo-image {
      width: 150px !important;
      max-height: 60px !important;
    }

    .menu-vertical .menu-item .menu-link {
      padding: 0.875rem 1rem;
    }

    .app-brand {
      padding: 1.5rem 1rem !important;
    }
  }

  @media (max-width: 480px) {
    .layout-menu {
      width: 100%;
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      z-index: 9999;
    }

    .logo-container {
      margin: 0 1rem;
    }
  }

  /* تحسينات عامة */
  body {
    background: var(--pure-white);
    color: var(--text-dark);
    line-height: 1.6;
  }

  .layout-page {
    background: var(--pure-white);
    flex: 1;
  }

  /* تأثير التركيز للوصول */
  .menu-link:focus {
    outline: 2px solid var(--accent-primary);
    outline-offset: 2px;
  }

  /* زر تبديل القائمة */
  .layout-menu-toggle {
    background: var(--pure-white);
    border: 1px solid var(--border-ultralight);
    border-radius: var(--radius-md);
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-subtle);
    transition: var(--transition-normal);
    color: var(--text-dark) !important;
  }

  .layout-menu-toggle:hover {
    background: var(--pure-white);
    border-color: var(--accent-primary);
    box-shadow: var(--shadow-soft);
    transform: scale(1.05);
    color: var(--accent-primary) !important;
  }

  /* تحسينات إضافية للتصميم العصري */

  /* تأثيرات الظل المحسنة */
  .layout-menu {
    box-shadow:
      0 0 0 1px var(--border-ultralight),
      0 4px 24px rgba(0, 0, 0, 0.04),
      0 8px 48px rgba(0, 0, 0, 0.06);
  }

  /* تأثيرات التحويم المتقدمة */
  .menu-vertical .menu-item .menu-link {
    transition:
      transform var(--transition-normal),
      box-shadow var(--transition-normal),
      border-color var(--transition-normal),
      background-color var(--transition-normal);
  }

  /* تحسينات الشعار */
  .logo-container {
    position: relative;
    overflow: hidden;
  }

  .logo-container::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg,
      rgba(255, 255, 255, 0.1) 0%,
      rgba(255, 255, 255, 0.05) 50%,
      rgba(255, 255, 255, 0.02) 100%);
    pointer-events: none;
  }

  /* تأثيرات النصوص */
  .menu-title {
    font-weight: 600;
    letter-spacing: -0.01em;
  }

  /* تحسينات الأيقونات */
  .menu-icon {
    position: relative;
  }

  .menu-icon::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: var(--pure-white);
    border-radius: 6px;
    z-index: -1;
    opacity: 0;
    transition: var(--transition-fast);
  }

  .menu-vertical .menu-item .menu-link:hover .menu-icon::before {
    opacity: 0.1;
  }

  /* تأثيرات متقدمة للعناصر النشطة */
  .menu-item.active {
    position: relative;
  }

  .menu-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 60%;
    background: var(--accent-primary);
    border-radius: 0 2px 2px 0;
    animation: activePulse 2s ease-in-out infinite;
  }

  @keyframes activePulse {
    0%, 100% {
      opacity: 1;
      box-shadow: 0 0 0 rgba(52, 152, 219, 0.4);
    }
    50% {
      opacity: 0.8;
      box-shadow: 0 0 10px rgba(52, 152, 219, 0.6);
    }
  }

  /* تحسينات الأداء والسلاسة */
  * {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
  }

  /* تأثيرات الانتقال المحسنة */
  .layout-menu,
  .menu-link,
  .menu-icon,
  .logo-container {
    will-change: transform, opacity;
  }

  /* تحسينات للشاشات عالية الدقة */
  @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .logo-image {
      filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.1));
    }
  }

  /* تحسينات الوصول */
  @media (prefers-reduced-motion: reduce) {
    * {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
    }
  }

  /* تأثيرات الظلام (للتوافق المستقبلي) */
  @media (prefers-color-scheme: dark) {
    .layout-menu {
      background: var(--pure-white);
      border-right-color: var(--border-ultralight);
    }

    body {
      background: var(--pure-white);
      color: var(--text-dark);
    }
  }

  /* تحسينات الطباعة */
  @media print {
    .layout-menu {
      display: none;
    }

    .layout-container {
      display: block;
    }
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
<div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }} bg-white min-h-screen">
  <div class="flex flex-row-reverse min-h-screen bg-white layout-container">

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

 
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
@endsection
