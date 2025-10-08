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
    --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #3b82f6 100%);
    --secondary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --gold-gradient: linear-gradient(135deg, #c6b37e 0%, #d8cba6 50%, #a89a69 100%);
    --hover-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%);
    --text-primary: #1f2937;
    --text-secondary: #6b7280;
    --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    --shadow-heavy: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
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
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    border-radius: var(--border-radius);
    margin: 20px;
    padding: 25px !important;
    transition: var(--transition-bounce);
    border: 1px solid rgba(255,255,255,0.2);
    position: relative;
    z-index: 2;
  }

  .app-brand:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-heavy);
    background: rgba(255,255,255,0.15);
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
    width: 200px;
    height: 200px;
    background: radial-gradient(circle, rgba(198, 179, 126, 0.3) 0%, rgba(216, 203, 166, 0.2) 40%, transparent 70%);
    border-radius: 50%;
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
    width: 100% !important;
    height: auto !important;
    max-width: 420px !important;
    max-height: 150px !important;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    transition: var(--transition-bounce);
    filter: drop-shadow(0 8px 20px rgba(0,0,0,0.3)) brightness(1.1);
    position: relative;
    z-index: 2;
    border-radius: var(--border-radius);
  }

  .app-brand-logo:hover .logo-image {
    transform: scale(1.1) rotate(2deg);
    filter: drop-shadow(0 15px 35px rgba(198, 179, 126, 0.6)) brightness(1.3) saturate(1.2);
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
    border: 1px solid rgba(255,255,255,0.1);
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
    border-color: rgba(198, 179, 126, 0.5);
  }

  /* تنسيق أيقونات القائمة */
  .menu-icon {
    font-size: 22px;
    margin-left: 15px;
    transition: var(--transition-bounce);
    position: relative;
    z-index: 2;
    color: rgba(255,255,255,0.8);
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
    color: #ffd700;
    animation: activePulse 2s infinite;
    text-shadow: 0 0 15px rgba(255, 215, 0, 0.8);
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
    color: rgba(255,255,255,0.9);
    transition: var(--transition-smooth);
  }

  .menu-item:hover .menu-link div,
  .menu-item:hover .menu-title {
    color: #ffffff;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  }

  /* تنسيق القوائم الفرعية */
  .menu-sub {
    background: rgba(0,0,0,0.2);
    border-radius: var(--border-radius);
    margin: 10px 0;
    padding: 10px 0;
    animation: slideDown 0.4s ease;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255,255,255,0.1);
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
    background: rgba(198, 179, 126, 0.8);
    transform: translateX(-3px);
  }

  /* تنسيق زر تبديل القائمة */
  .menu-toggle::after {
    content: '▼';
    float: left;
    transition: var(--transition-smooth);
    margin-right: 10px;
    font-size: 12px;
    color: rgba(255,255,255,0.7);
  }

  .menu-item.open .menu-toggle::after {
    transform: rotate(180deg);
    color: #ffd700;
  }

  /* تأثير ظل إضافي عند تحويم المؤشر على القائمة */
  .layout-menu:hover {
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    transform: translateX(2px);
  }

  /* تنسيق زر إغلاق/فتح القائمة */
  .layout-menu-toggle {
    transition: var(--transition-bounce);
    color: rgba(255,255,255,0.8) !important;
  }

  .layout-menu-toggle:hover {
    transform: scale(1.2) rotate(180deg);
    color: #ffd700 !important;
  }

  /* تنسيقات شريط التمرير */
  .menu-inner {
    scrollbar-width: thin;
    scrollbar-color: rgba(198, 179, 126, 0.5) transparent;
  }

  .menu-inner::-webkit-scrollbar {
    width: 8px;
  }

  .menu-inner::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.1);
    border-radius: 4px;
  }

  .menu-inner::-webkit-scrollbar-thumb {
    background: var(--gold-gradient);
    border-radius: 4px;
    transition: var(--transition-smooth);
  }

  .menu-inner::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #d8cba6 0%, #c6b37e 100%);
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
    box-shadow: 0 0 20px rgba(198, 179, 126, 0.5);
    animation: activeGlow 2s ease-in-out infinite;
  }

  @keyframes activeGlow {
    0%, 100% {
      box-shadow: 0 0 20px rgba(198, 179, 126, 0.5);
    }
    50% {
      box-shadow: 0 0 30px rgba(198, 179, 126, 0.8);
    }
  }

  /* تحسين الخطوط العربية */
  * {
    font-family: 'Cairo', 'Segoe UI', 'Tahoma', sans-serif;
  }

  /* تأثير تركيز محسن */
  .menu-link:focus {
    outline: 2px solid rgba(198, 179, 126, 0.8);
    outline-offset: 2px;
    background: rgba(198, 179, 126, 0.2);
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

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z" fill="currentColor" fill-opacity="0.6" />
            <path d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z" fill="currentColor" fill-opacity="0.38" />
          </svg>
        </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="py-1 menu-inner">
        {{-- Dashboard --}}
        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
          <a href="{{ Route('Dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-view-dashboard-outline"></i>
            <div>{{ trans('sidebar.dashboard') }}</div>
          </a>
        </li>

        @can('employees')
        <li class="menu-item {{ request()->is('Workers', 'AddWorker', 'Thanks', 'Penalties', 'Jobleavers', 'Dispatch', 'Certific', 'Holidays', 'Wives', 'Childrens', 'Placements', 'Positions', 'Services', 'Inputs', 'Itypes') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-account-group-outline'></i>
            <span class="menu-title">قسم الموارد البشرية</span>
          </a>

          <ul class="menu-sub">
            @can('workers')
            <li class="menu-item {{ request()->is('Workers') ? 'active' : '' }}">
              <a href="{{ Route('Workers') }}" class="menu-link">
                <i class=""></i>
                <div>المعلومات العامة</div>
              </a>
            </li>
            <li class="menu-item {{ request()->is('AddWorker') ? 'active' : 'hidden' }}">
              <a href="{{ Route('AddWorker') }}" class="menu-link">
                <i class=""></i>
                <div>إضافة موظف</div>
              </a>
            </li>
            @endcan
            @can('wives')
            <li class="menu-item {{ request()->is('Wives') ? 'active' : '' }}">
              <a href="{{ Route('Wives.index') }}" class="menu-link">
                <i class=""></i>
                <div>بيانات الزوج/ـة</div>
              </a>
            </li>
            @endcan
            @can('childrens')
            <li class="menu-item {{ request()->is('Childrens') ? 'active' : '' }}">
              <a href="{{ Route('Childrens.index') }}" class="menu-link">
                <i class=""></i>
                <div>بيانات الاطفال</div>
              </a>
            </li>
            @endcan
            @can('certific')
            <li class="menu-item {{ request()->is('Certific') ? 'active' : '' }}">
              <a href="{{ Route('Certific.index') }}" class="menu-link">
                <i class=""></i>
                <div>الشهادات</div>
              </a>
            </li>
            @endcan
            @can('placements')
            <li class="menu-item {{ request()->is('Placements') ? 'active' : '' }}">
              <a href="{{ Route('Placements.index') }}" class="menu-link">
                <i class=""></i>
                <div>التنسيب</div>
              </a>
            </li>
            @endcan
            @can('positions')
            <li class="menu-item {{ request()->is('Positions') ? 'active' : '' }}">
              <a href="{{ Route('Positions.index') }}" class="menu-link">
                <i class=""></i>
                <div>المنصب</div>
              </a>
            </li>
            @endcan
            @can('thanks')
            <li class="menu-item {{ request()->is('Thanks') ? 'active' : '' }}">
              <a href="{{ Route('Thanks.index') }}" class="menu-link">
                <i class=""></i>
                <div>الشكر و التقدير</div>
              </a>
            </li>
            @endcan
            @can('penalties')
            <li class="menu-item {{ request()->is('Penalties') ? 'active' : '' }}">
              <a href="{{ Route('Penalties.index') }}" class="menu-link">
                <i class=""></i>
                <div>العقوبات</div>
              </a>
            </li>
            @endcan
            @can('jobleavers')
            <li class="menu-item {{ request()->is('Jobleavers') ? 'active' : '' }}">
              <a href="{{ Route('Jobleavers.index') }}" class="menu-link">
                <i class=""></i>
                <div>تاركي العمل</div>
              </a>
            </li>
            @endcan
            @can('services')
            <li class="menu-item {{ request()->is('Services') ? 'active' : '' }}">
              <a href="{{ Route('Services.index') }}" class="menu-link">
                <i class=""></i>
                <div>خلاصة الخدمة</div>
              </a>
            </li>
            @endcan
            @can('dispatch')
            <li class="menu-item {{ request()->is('Dispatch') ? 'active' : '' }}">
              <a href="{{ Route('Dispatch.index') }}" class="menu-link">
                <i class=""></i>
                <div>الأيفادات</div>
              </a>
            </li>
            @endcan
            @can('holidays')
            <li class="menu-item {{ request()->is('Holidays') ? 'active' : '' }}">
              <a href="{{ Route('Holidays.index') }}" class="menu-link">
                <i class=""></i>
                <div>الاجازات</div>
              </a>
            </li>
            @endcan
            @can('empInfoBank')
            <li class="menu-item {{ request()->is('EmpInfoBank') ? 'active' : '' }}">
              <a href="" class="menu-link">
                <i class=""></i>
                <div>العلاوات</div>
              </a>
            </li>
            @endcan
            @can('empInfoBank')
            <li class="menu-item {{ request()->is('EmpInfoBank') ? 'active' : '' }}">
              <a href="" class="menu-link">
                <i class=""></i>
                <div>الترفيعات</div>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('financial')
        <li class="menu-item {{ request()->is('Salaries', 'Inputs', 'Itypes', 'Iaccts', 'Idepartments') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-calculator'></i>
            <span class="menu-title">القسم المالي</span>
          </a>
          <ul class="menu-sub">
            @can('salaries')
            <li class="menu-item {{ request()->is('Salaries') ? 'active' : '' }}">
              <a href="{{ Route('Salaries.index') }}" class="menu-link">
                <i class=""></i>
                <div>الرواتب</div>
              </a>
            </li>
            @endcan
            @can('inputs')
            <li class="menu-item {{ request()->is('Inputs') ? 'active' : '' }}">
              <a href="{{ Route('Inputs.index') }}" class="menu-link">
                <i class=""></i>
                <div>المدخلات</div>
              </a>
            </li>
            @endcan
            @can('itypes')
            <li class="menu-item {{ request()->is('Itypes') ? 'active' : '' }}">
              <a href="{{ Route('Itypes.index') }}" class="menu-link">
                <i class=""></i>
                <div>أنواع المدخلات</div>
              </a>
            </li>
            @endcan
            @can('iaccts')
            <li class="menu-item {{ request()->is('Iaccts') ? 'active' : '' }}">
              <a href="{{ Route('Iaccts.index') }}" class="menu-link">
                <i class=""></i>
                <div>حسابات المدخلات</div>
              </a>
            </li>
            @endcan
            @can('idepartments')
            <li class="menu-item {{ request()->is('Idepartments') ? 'active' : '' }}">
              <a href="{{ Route('Idepartments.index') }}" class="menu-link">
                <i class=""></i>
                <div>أقسام المدخلات</div>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('informations')
        <li class="menu-item {{ request()->is('Informations', 'Infooffice', 'Grades', 'Jobtitles', 'Specialtys', 'Scaleas', 'Scalems', 'Linkages', 'Precises', 'Provinces', 'Districts', 'Areas', 'Sections', 'Units', 'Branch', 'Department') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-information-outline'></i>
            <span class="menu-title">المعلومات الأساسية</span>
          </a>
          <ul class="menu-sub">
            @can('infooffice')
            <li class="menu-item {{ request()->is('Infooffice') ? 'active' : '' }}">
              <a href="{{ Route('Infooffice.index') }}" class="menu-link">
                <i class=""></i>
                <div>معلومات المكتب</div>
              </a>
            </li>
            @endcan
            @can('grades')
            <li class="menu-item {{ request()->is('Grades') ? 'active' : '' }}">
              <a href="{{ Route('Grades.index') }}" class="menu-link">
                <i class=""></i>
                <div>الدرجات الوظيفية</div>
              </a>
            </li>
            @endcan
            @can('jobtitles')
            <li class="menu-item {{ request()->is('Jobtitles') ? 'active' : '' }}">
              <a href="{{ Route('Jobtitles.index') }}" class="menu-link">
                <i class=""></i>
                <div>العناوين الوظيفية</div>
              </a>
            </li>
            @endcan
            @can('specialtys')
            <li class="menu-item {{ request()->is('Specialtys') ? 'active' : '' }}">
              <a href="{{ Route('Specialtys.index') }}" class="menu-link">
                <i class=""></i>
                <div>التخصصات</div>
              </a>
            </li>
            @endcan
            @can('scaleas')
            <li class="menu-item {{ request()->is('Scaleas') ? 'active' : '' }}">
              <a href="{{ Route('Scaleas.index') }}" class="menu-link">
                <i class=""></i>
                <div>سلم الرواتب أ</div>
              </a>
            </li>
            @endcan
            @can('scalems')
            <li class="menu-item {{ request()->is('Scalems') ? 'active' : '' }}">
              <a href="{{ Route('Scalems.index') }}" class="menu-link">
                <i class=""></i>
                <div>سلم الرواتب م</div>
              </a>
            </li>
            @endcan
            @can('linkages')
            <li class="menu-item {{ request()->is('Linkages') ? 'active' : '' }}">
              <a href="{{ Route('Linkages.index') }}" class="menu-link">
                <i class=""></i>
                <div>الارتباطات</div>
              </a>
            </li>
            @endcan
            @can('precises')
            <li class="menu-item {{ request()->is('Precises') ? 'active' : '' }}">
              <a href="{{ Route('Precises.index') }}" class="menu-link">
                <i class=""></i>
                <div>التخصص الدقيق</div>
              </a>
            </li>
            @endcan
            @can('provinces')
            <li class="menu-item {{ request()->is('Provinces') ? 'active' : '' }}">
              <a href="{{ Route('Provinces.index') }}" class="menu-link">
                <i class=""></i>
                <div>المحافظات</div>
              </a>
            </li>
            @endcan
            @can('districts')
            <li class="menu-item {{ request()->is('Districts') ? 'active' : '' }}">
              <a href="{{ Route('Districts.index') }}" class="menu-link">
                <i class=""></i>
                <div>الأقضية</div>
              </a>
            </li>
            @endcan
            @can('areas')
            <li class="menu-item {{ request()->is('Areas') ? 'active' : '' }}">
              <a href="{{ Route('Areas.index') }}" class="menu-link">
                <i class=""></i>
                <div>النواحي</div>
              </a>
            </li>
            @endcan
            @can('sections')
            <li class="menu-item {{ request()->is('Sections') ? 'active' : '' }}">
              <a href="{{ Route('Sections.index') }}" class="menu-link">
                <i class=""></i>
                <div>الأقسام</div>
              </a>
            </li>
            @endcan
            @can('units')
            <li class="menu-item {{ request()->is('Units') ? 'active' : '' }}">
              <a href="{{ Route('Units.index') }}" class="menu-link">
                <i class=""></i>
                <div>الوحدات</div>
              </a>
            </li>
            @endcan
            @can('branch')
            <li class="menu-item {{ request()->is('Branch') ? 'active' : '' }}">
              <a href="{{ Route('Branch.index') }}" class="menu-link">
                <i class=""></i>
                <div>الشعب</div>
              </a>
            </li>
            @endcan
            @can('department')
            <li class="menu-item {{ request()->is('Department') ? 'active' : '' }}">
              <a href="{{ Route('Department.index') }}" class="menu-link">
                <i class=""></i>
                <div>الدوائر</div>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('trainings')
        <li class="menu-item {{ request()->is('Trainings', 'Courses', 'Coaches') ? 'open active' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon tf-icons mdi mdi-school-outline'></i>
            <span class="menu-title">التدريب والتطوير</span>
          </a>
          <ul class="menu-sub">
            @can('trainings')
            <li class="menu-item {{ request()->is('Trainings') ? 'active' : '' }}">
              <a href="{{ Route('Trainings.index') }}" class="menu-link">
                <i class=""></i>
                <div>التدريبات</div>
              </a>
            </li>
            @endcan
            @can('courses')
            <li class="menu-item {{ request()->is('Courses') ? 'active' : '' }}">
              <a href="{{ Route('Courses.index') }}" class="menu-link">
                <i class=""></i>
                <div>الدورات</div>
              </a>
            </li>
            @endcan
            @can('coaches')
            <li class="menu-item {{ request()->is('Coaches') ? 'active' : '' }}">
              <a href="{{ Route('Coaches.index') }}" class="menu-link">
                <i class=""></i>
                <div>المدربين</div>
              </a>
            </li>
            @endcan
          </ul>
        </li>
        @endcan

        @can('contracts')
        <li class="menu-item {{ request()->is('Contracts') ? 'active' : '' }}">
          <a href="{{ Route('Contracts.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-file-document-outline"></i>
            <div>العقود</div>
          </a>
        </li>
        @endcan

        @can('tracking')
        <li class="menu-item {{ request()->is('Tracking') ? 'active' : '' }}">
          <a href="{{ Route('Tracking.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-map-marker-path"></i>
            <div>التتبع</div>
          </a>
        </li>
        @endcan

        @can('realities')
        <li class="menu-item {{ request()->is('Realities') ? 'active' : '' }}">
          <a href="{{ Route('Realities') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-chart-line"></i>
            <div>الواقع</div>
          </a>
        </li>
        @endcan

        @can('plots')
        <li class="menu-item {{ request()->is('Plots') ? 'active' : '' }}">
          <a href="{{ Route('Plots') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-map-outline"></i>
            <div>القطع</div>
          </a>
        </li>
        @endcan

        @can('backup')
        <li class="menu-item {{ request()->is('Backup') ? 'active' : '' }}">
          <a href="{{ Route('backup') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-backup-restore"></i>
            <div>النسخ الاحتياطي</div>
          </a>
        </li>
        @endcan

        @can('emaillists')
        <li class="menu-item {{ request()->is('Emaillists') ? 'active' : '' }}">
          <a href="{{ Route('Emaillists.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
            <div>قوائم البريد الإلكتروني</div>
          </a>
        </li>
        @endcan

        @role(['OWNER'])
        @can('usersapp')
        <li class="menu-item {{ request()->is('Usersapp') ? 'active' : '' }}">
          <a href="{{ Route('Usersapp.index') }}" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-account-multiple-outline"></i>
            <div>مستخدمي التطبيق</div>
          </a>
        </li>
        @endcan

        @can('permissions&roles')
        <li class="menu-item {{ request()->is('Permissions&Roles/Account-Permissions', 'Permissions&Roles/Account-Roles') ? 'open active' : '' }}">
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
        @endrole
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
