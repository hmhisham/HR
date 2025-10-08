@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
$configData = Helper::appClasses();
@endphp

<!-- إضافة ملف CSS للتأثيرات الحركية الاحترافية -->
 <style>
  /* متغيرات الألوان الاحترافية */
  :root {
    /* --primary-gradient: linear-gradient(135deg, #0d2b6b 0%, #1e40af 50%, #3b82f6 100%); */
    --secondary-gradient: linear-gradient(135deg, #0732ef 0%, #2563eb 100%);
    --gold-gradient: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
    --hover-gradient: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #3b82f6 100%);
    --text-primary: #1e3a8a;
    --text-secondary: #1e40af;
    --shadow-light: 0 4px 6px -1px rgba(30, 58, 138, 0.1);
    --shadow-medium: 0 10px 15px -3px rgba(30, 58, 138, 0.2);
    --shadow-heavy: 0 20px 25px -5px rgba(30, 58, 138, 0.3);
    --border-radius: 12px;
    --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-bounce: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  /* تنسيق القائمة الرئيسية مع تدرج احترافي */
  .layout-menu {
    background: var(--primary-gradient);
    box-shadow: var(--shadow-heavy);
    border-radius: 0 var(--border-radius) var(--border-radius) 0;
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(10px);
  }

  /* تأثير بريق متحرك على القائمة */
  .layout-menu::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    animation: shimmer 4s infinite;
    z-index: 1;
  }

  @keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
  }

  /* تنسيق منطقة الشعار */
 .app-brand {
    transition: var(--transition-bounce);
    position: relative;
    margin: 10px auto;
    padding: 65px !important;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    z-index:1;
  }

  /* حاوي الشعار الرئيسي */
  .logo-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 480px;
    height: auto;
    min-height: 165px;
    margin: -5px auto 0 auto;
    overflow: visible;
    text-align: center;
  }

  /* تأثير توهج خلف الشعار */
  .logo-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 140px;
    height: 140px;
    background: radial-gradient(circle, rgba(30, 58, 138, 0.3) 0%, rgba(59, 130, 246, 0.2) 40%, transparent 70%);
    /* border-radius: 50%; */
    transform: translate(-50%, -50%);
    animation: logoGlow 4s ease-in-out infinite;
    z-index: 0;
  }


  @keyframes logoGlow {
    0%, 100% {
      transform: translate(-50%, -50%) scale(0.8);
      opacity: 0.4;
    }
    50% {
      transform: translate(-50%, -50%) scale(1.2);
      opacity: 0.8;
    }
  }

  /* تنسيقات صورة الشعار */
  .logo-image {
    width: 80% !important;
    height: auto !important;
    max-width: 420px !important;
    max-height: 150px !important;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    transition: var(--transition-bounce);
    position: relative;
    z-index: 2;
    border-radius: var(--border-radius);
  }

  /* تنسيق المحتوى الداخلي للقائمة */
  .menu-inner {
    padding: 20px 0;
    position: relative;
    z-index: 2;
  }

  /* تنسيق عناصر القائمة */
  .menu-vertical .menu-item .menu-link {
    padding: 0.75rem 1.5rem;
    margin: 0.25rem 1rem;
    border-radius: var(--border-radius);
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(30, 58, 138, 0.1);
  }

  /* تأثير حركي لعناصر القائمة */
  .menu-item .menu-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
    z-index: 1;
  }

  .menu-item:hover .menu-link::before {
    left: 100%;
  }

  /* تأثير hover محسن */
  .menu-item:hover .menu-link {
    background: var(--gold-gradient);
    transform: translateX(-5px) scale(1.02);
    box-shadow: var(--shadow-medium);
    border-color: rgba(30, 58, 138, 0.5);
  }

  /* تنسيق أيقونات القائمة */
  .menu-icon {
    font-size: 22px;
    margin-left: 15px;
    transition: var(--transition-bounce);
    position: relative;
    z-index: 2;
    color: rgba(30, 58, 138, 0.8);
  }

  /* تأثير حركي للأيقونات عند التحويم */
  .menu-item:hover .menu-icon {
    transform: scale(1.3) rotate(15deg);
    color: #ffffff;
    text-shadow: 0 0 10px rgba(255,255,255,0.5);
    animation: iconBounce 0.6s ease;
  }

  @keyframes iconBounce {
    0%, 20%, 50%, 80%, 100% {
      transform: scale(1.3) rotate(15deg) translateY(0);
    }
    40% {
      transform: scale(1.4) rotate(20deg) translateY(-3px);
    }
    60% {
      transform: scale(1.35) rotate(10deg) translateY(-2px);
    }
  }

  /* تنسيق الأيقونة في العنصر النشط */
  .menu-item.active .menu-icon {
    color: #1e40af;
    animation: activePulse 2s infinite;
    text-shadow: 0 0 15px rgba(30, 58, 138, 0.8);
  }

  @keyframes activePulse {
    0%, 100% {
      transform: scale(1.1);
      opacity: 1;
    }
    50% {
      transform: scale(1.25);
      opacity: 0.8;
    }
  }

  /* تنسيق النصوص */
  .menu-link div,
  .menu-title {
    font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 600;
    letter-spacing: 0.5px;
    position: relative;
    z-index: 2;
    color: rgba(30, 58, 138, 0.9);
    transition: var(--transition-smooth);
  }

  .menu-item:hover .menu-link div,
  .menu-item:hover .menu-title {
    color: #ffffff;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  }

  /* تنسيق القوائم الفرعية */
  .menu-sub {
    background: rgba(30, 58, 138, 0.2);
    border-radius: var(--border-radius);
    margin: 10px 0;
    padding: 10px 0;
    animation: slideDown 0.4s ease;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(30, 58, 138, 0.1);
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-15px);
      max-height: 0;
    }
    to {
      opacity: 1;
      transform: translateY(0);
      max-height: 500px;
    }
  }

  /* تنسيق عناصر القائمة الفرعية */
  .menu-sub .menu-item .menu-link {
    margin: 5px 15px;
    padding: 0.5rem 1rem;
    background: rgba(255,255,255,0.03);
    font-size: 0.9rem;
  }

  .menu-sub .menu-item:hover .menu-link {
    background: rgba(30, 64, 175, 0.8);
    transform: translateX(-3px);
  }

  /* تنسيق زر تبديل القائمة */
  .menu-toggle::after {
    content: '▼';
    float: left;
    transition: var(--transition-smooth);
    margin-right: 10px;
    font-size: 12px;
    color: rgba(30, 58, 138, 0.7);
  }

  .menu-item.open .menu-toggle::after {
    transform: rotate(180deg);
    color: #1e40af;
  }

  /* تأثير ظل إضافي عند تحويم المؤشر على القائمة */
  .layout-menu:hover {
    box-shadow: 0 25px 50px rgba(30, 58, 138, 0.3);
    transform: translateX(2px);
  }

  /* تنسيق زر إغلاق/فتح القائمة */
  .layout-menu-toggle {
    transition: var(--transition-bounce);
    color: rgba(30, 58, 138, 0.8) !important;
  }

  .layout-menu-toggle:hover {
    transform: scale(1.2) rotate(180deg);
    color: #1e40af !important;
  }

  /* تنسيقات شريط التمرير */
  .menu-inner {
    scrollbar-width: thin;
    scrollbar-color: rgba(30, 64, 175, 0.5) transparent;
  }

  .menu-inner::-webkit-scrollbar {
    width: 8px;
  }

  .menu-inner::-webkit-scrollbar-track {
    background: rgba(30, 58, 138, 0.1);
    border-radius: 4px;
  }

  .menu-inner::-webkit-scrollbar-thumb {
    background: var(--gold-gradient);
    border-radius: 4px;
    transition: var(--transition-smooth);
  }

  .menu-inner::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
  }

  /* تأثيرات الاستجابة للشاشات المختلفة */
  @media (max-width: 768px) {
    .logo-container {
      max-width: 360px;
      min-height: 135px;
      margin: -3px auto 0 auto;
    }

    .logo-image {
      max-width: 330px !important;
      max-height: 120px !important;
    }

    .menu-icon {
      font-size: 20px;
    }

    .menu-item:hover .menu-icon {
      transform: scale(1.2) rotate(10deg);
    }
  }

  @media (min-width: 769px) and (max-width: 1199px) {
    .logo-container {
      max-width: 420px;
      min-height: 150px;
      margin: -4px auto 0 auto;
    }

    .logo-image {
      max-width: 375px !important;
      max-height: 135px !important;
    }
  }

  @media (min-width: 1200px) {
    .logo-container {
      max-width: 480px;
      min-height: 165px;
      margin: -5px auto 0 auto;
    }

    .logo-image {
      max-width: 420px !important;
      max-height: 150px !important;
    }
  }

  /* تأثيرات إضافية للتفاعل */
  .menu-item {
    animation: fadeInLeft 0.6s ease forwards;
    opacity: 0;
  }

  .menu-item:nth-child(1) { animation-delay: 0.1s; }
  .menu-item:nth-child(2) { animation-delay: 0.2s; }
  .menu-item:nth-child(3) { animation-delay: 0.3s; }
  .menu-item:nth-child(4) { animation-delay: 0.4s; }
  .menu-item:nth-child(5) { animation-delay: 0.5s; }
  .menu-item:nth-child(6) { animation-delay: 0.6s; }
  .menu-item:nth-child(7) { animation-delay: 0.7s; }
  .menu-item:nth-child(8) { animation-delay: 0.8s; }

  @keyframes fadeInLeft {
    from {
      opacity: 0;
      transform: translateX(-30px);
    }
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  /* تأثير نبضة للعناصر النشطة */
  .menu-item.active .menu-link {
    background: var(--gold-gradient);
    box-shadow: 0 0 20px rgba(30, 64, 175, 0.5);
    animation: activeGlow 2s ease-in-out infinite;
  }

  @keyframes activeGlow {
    0%, 100% {
      box-shadow: 0 0 20px rgba(30, 64, 175, 0.5);
    }
    50% {
      box-shadow: 0 0 30px rgba(30, 58, 138, 0.8);
    }
  }

  /* تحسين الخطوط العربية */
  * {
    font-family: 'Cairo', 'Segoe UI', 'Tahoma', sans-serif;
  }

  /* تأثير تركيز محسن */
  .menu-link:focus {
    outline: 2px solid rgba(30, 64, 175, 0.8);
    outline-offset: 2px;
    background: rgba(30, 64, 175, 0.2);
  }

  /* تأثير الضغط */
  .menu-link:active {
    transform: scale(0.98);
    transition: transform 0.1s ease;
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

        {{-- <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z" fill="currentColor" fill-opacity="0.6" />
            <path d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z" fill="currentColor" fill-opacity="0.38" />
          </svg>
        </a> --}}
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

        {{-- @can('employees')
        <li class="menu-item {{ request()->is('Workers', 'AddWorker', 'Thanks', 'Penalties', 'Jobleavers', 'Dispatch', 'Certific', 'Holidays', 'Wives', 'Childrens', 'Placements', 'Positions', 'Services', 'Inputs', 'Itypes') ? 'open active' : '' }}">
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
              <a href="{{ Route('Certific.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>الشهادات</div>
              </a>
            </li>
            @endcan
            @can('placements')
            <li Class="menu-item {{ request()->Is('Placements') ? 'active' : '' }}">
              <a href="{{ Route('Placements.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>التنسيب</div>
              </a>
            </li>
            @endcan
            @can('positions')
            <li Class="menu-item {{ request()->Is('Positions') ? 'active' : '' }}">
              <a href="{{ Route('Positions.index') }}" Class="menu-link">
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
              <a href="{{ Route('Penalties.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>العقوبات</div>
              </a>
            </li>
            @endcan
            @can('jobleavers')
            <li Class="menu-item {{ request()->Is('Jobleavers') ? 'active' : '' }}">
              <a href="{{ Route('Jobleavers.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>تاركي العمل</div>
              </a>
            </li>
            @endcan
            @can('services')
            <li Class="menu-item {{ request()->Is('Services') ? 'active' : '' }}">
              <a href="{{ Route('Services.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>خلاصة الخدمة</div>
              </a>
            </li>
            @endcan
            @can('dispatch')
            <li Class="menu-item {{ request()->Is('Dispatch') ? 'active' : '' }}">
              <a href="{{ Route('Dispatch.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>الأيفادات</div>
              </a>
            </li>
            @endcan
            @can('holidays')
            <li Class="menu-item {{ request()->Is('Holidays') ? 'active' : '' }}">
              <a href="{{ Route('Holidays.index') }}" Class="menu-link">
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
        @endcan --}}
        {{-- @can('financial')
        <li class="menu-item {{ request()->is('Salaries', 'Inputs', 'Itypes', 'Iaccts', 'Idepartments') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-calculator'></i>
            <span class="menu-title">القسم المالي</span>
          </a>
          <ul class="menu-sub">
            @can('itypes')
            <li Class="menu-item {{ request()->Is('Itypes') ? 'active' : '' }}">
              <a href="{{ Route('Itypes.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>انواع القيود</div>
              </a>
            </li>
            @endcan
            @can('iaccts')
            <li Class="menu-item {{ request()->Is('Iaccts') ? 'active' : '' }}">
              <a href="{{ Route('Iaccts.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>الدليل المحاسبي</div>
              </a>
            </li>
            @endcan
            @can('idepartments')
            <li Class="menu-item {{ request()->Is('Idepartments') ? 'active' : '' }}">
              <a href="{{ Route('Idepartments.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>دليل الاقسام</div>
              </a>
            </li>
            @endcan
            @can('inputs')
            <li Class="menu-item {{ request()->Is('Inputs') ? 'active' : '' }}">
              <a href="{{ Route('Inputs.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>ادخال اليومية</div>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan--}}
        @can('landproperty')
        <li class="menu-item {{ request()->is('Provinces', 'Plots', 'Show-Plot/*', 'Realities', 'Show-Realitie/*', 'Boycotts', 'Bonds', 'Bond-Show/*', 'Real-Property', 'Show-Real-Property/*', 'Estate' ,'Propertyfolder') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-map-outline'></i>
            <span class="menu-title">الاملاك و الاراضي</span>
          </a>
          <ul class="menu-sub">
            @can('provinces')
            <li Class="menu-item {{ request()->Is('Provinces') ? 'active' : '' }}">
              <a href="{{ Route('Provinces.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>المقاطعات</div>
              </a>
            </li>
            @endcan
            @can('plots')
            <li Class="menu-item {{ request()->Is('Plots') ? 'active' : '' }}">
              <a href="{{ Route('Plots') }}" Class="menu-link">
                <i Class=""></i>
                <div>القطع</div>
              </a>
            </li>

            <li Class="menu-item {{ request()->Is('Show-Plot/*') ? 'active' : 'hidden' }}">
              <a href="javascript:void(0)" Class="menu-link">
                <i Class=""></i>
                <div>عرض القطعة</div>
              </a>
            </li>
            @endcan
            @can('realities')
            <li Class="menu-item {{ request()->Is('Realities') ? 'active' : '' }}">
              <a href="{{ Route('Realities') }}" Class="menu-link">
                <i Class=""></i>
                <div>السند العقاري</div>
              </a>
            </li>

            <li Class="menu-item {{ request()->Is('Show-Realitie/*') ? 'active' : 'hidden' }}">
              <a href="javascript:void(0)" Class="menu-link">
                <i Class=""></i>
                <div>عرض السند العقاري</div>
              </a>
            </li>
            @endcan
            @can('realProperty')
            <li Class="menu-item {{ request()->Is('Real-Property') ? 'active' : '' }}">
              <a href="{{ Route('RealProperty') }}" Class="menu-link">
                <i Class=""></i>
                <div>الاسكان</div>
              </a>
            </li>

            <li Class="menu-item {{ request()->Is('Show-Real-Property/*') ? 'active' : 'hidden' }}">
              <a href="#" Class="menu-link">
                <i Class=""></i>
                <div>عرض الاسكان</div>
              </a>
            </li>

            <li Class="menu-item {{ request()->Is('Propertyfolder') ? 'active' : '' }}">
              <a href="{{ Route('Propertyfolder.index') }}" Class="menu-link">

                <div>اضبارة العقار</div>
              </a>
            </li>


            @endcan
          </ul>
        </li>
        @endcan
        {{-- @can('training')
        <li class="menu-item {{ request()->is('Coaches', 'Courses') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-account-tie-voice-outline'></i>
            <span class="menu-title">التدريب و التطوير</span>
          </a>
          <ul class="menu-sub">
            @can('coaches')
            <li Class="menu-item {{ request()->Is('Coaches') ? 'active' : '' }}">
              <a href="{{ Route('Coaches.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>المدربين</div>
              </a>
            </li>
            @endcan
            @can('courses')
            <li Class="menu-item {{ request()->Is('Courses') ? 'active' : '' }}">
              <a href="{{ Route('Courses.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>الدورات</div>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan --}}
        {{-- @can('files')

                                <li class="menu-item {{ request()->is('Private-Employee-Files') ? 'active' : '' }}">
        <a href="{{ Route('PrivateEmployeeFiles') }}" class="menu-link">
          <i class="menu-icon tf-icons mdi mdi-file-cloud-outline"></i>
          <div>{{ trans('sidebar.PrivateEmployeeFiles') }}</div>
        </a>
        </li>
        @endcan --}}
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

            {{-- =================نافذة تاجير العقارات================== --}}

            @can('propertylocation')
            {{-- موقع العقار --}}
            <li Class="menu-item {{ request()->Is('Propertylocation') ? 'active' : '' }}">
              <a href="{{ Route('Propertylocation.index') }}" Class="menu-link">
                {{-- <i Class='menu-icon tf-icons mdi mdi-map-marker-outline'></i> --}}
                <div>موقع العقار</div>
              </a>
            </li>
            @endcan
            @can('propertytyperented')
            <li Class="menu-item {{ request()->Is('Propertytyperented') ? 'active' : '' }}">
              <a href="{{ Route('Propertytyperented.index') }}" Class="menu-link">
                <div>نوع العقار المؤجر</div>
              </a>
            </li>
            @endcan
            @can('descriptionrented')
            <li Class="menu-item {{ request()->Is('Descriptionrented') ? 'active' : '' }}">
              <a href="{{ Route('Descriptionrented.index') }}" Class="menu-link">
                <div>صفة العقار المؤجر</div>
              </a>
            </li>
            @endcan
            <li Class="menu-item {{ request()->Is('Contracts') ? 'active' : '' }}">
              <a href="{{ Route('Contracts.index') }}" Class="menu-link">
                <i Class='menu-icon tf-icons mdi mdi-account-outline'></i>
                <div>عقد الايجار</div>
              </a>
            </li>
<li Class="menu-item {{ request()->Is('Tenants') ? 'active' : '' }}">
  <a href = "{{ Route('Tenants.index') }}" Class="menu-link">
   <i Class='menu-icon tf-icons mdi mdi-account-outline'></i>
   <div>المستأجر</div>
 </a>
</li>
            @can('usersapp')
            {{-- مستخدمي التطبيق --}}
            <li Class="menu-item {{ request()->Is('Usersapp') ? 'active' : '' }}">
              <a href="{{ Route('Usersapp.index') }}" Class="menu-link">
                <i Class=""></i>
                <div>مستخدمي التطبيق</div>
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
            @can('backup')
            {{-- النسخ الاحتياطي --}}
            <li Class="menu-item {{ request()->Is('backup') ? 'active' : '' }}">
              <a href="{{ Route('backup') }}" Class="menu-link">
                <i Class=""></i>
                <div>النسخ الاحتياطي</div>
              </a>
            </li>
            @endcan
            @can('employees')
            <li Class="menu-item {{ request()->Is('employees') ? 'active' : '' }}">
              <a href="{{ route('employees.index') }}" Class="menu-link">
                <i Class=""></i>
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
