@extends('layouts/layoutMaster')
@section('title', 'Rental')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <style>
      .select2-container { width: 100% !important; }
      .select2-selection--single .select2-selection__rendered { white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }
      .select2-container--default .select2-results__options { max-height: calc(8 * 2.25em) !important; overflow-y: auto !important; }
      .select2-container--default .select2-results__option { line-height: 2.25em; padding: 0 0.75rem; }
    </style>
@endsection

@section('content')
  @livewire('rental.rental')
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/l10n/ar.js') }}"></script>
@endsection

@section('page-script')
<script>
  // Init Flatpickr in Arabic for date inputs
  function initFlatpickr() {
    try {
      const commonOptions = {
        dateFormat: 'Y-m-d',
        locale: 'ar',
        disableMobile: true,
        allowInput: true
      };
      if (window.flatpickr) {
        // Add modal
        const addEl = document.getElementById('addRentalDate');
        if (addEl) {
          if (addEl._flatpickr) addEl._flatpickr.destroy();
          window.flatpickr(addEl, commonOptions);
        }
        // Edit modal
        const editEl = document.getElementById('editRentalDate');
        if (editEl) {
          if (editEl._flatpickr) editEl._flatpickr.destroy();
          window.flatpickr(editEl, commonOptions);
        }
      }
    } catch (e) {
      console.error('Flatpickr init error', e);
    }
  }

  // Helper to init select2 with Livewire integration
  function initSelect2(selector, eventName, parentSelector) {
    try {
      const $el = $(selector);
      const options = {
        dropdownParent: $(parentSelector),
        allowClear: true,
        width: '100%'
      };
      $el.select2(options).on('change', function (e) {
        const value = e.target.value || null;
        if (window.Livewire && Livewire.emit) {
          Livewire.emit(eventName, value);
        }
      });
    } catch (error) {
      console.error('Error initializing Select2 for', selector, error);
    }
  }

  function reinitAllSelect2() {
    initSelect2('#addRentalTenantName', 'SelectTenantName', '#addRentalModal');
    initSelect2('#editRentalTenantName', 'SelectTenantName', '#editRentalModal');
  }

  // Initial init
  reinitAllSelect2();
  initFlatpickr();

  // Re-init after Livewire updates
  if (window.Livewire) {
    Livewire.hook('message.processed', (message, component) => {
      setTimeout(() => {
        reinitAllSelect2();
        initFlatpickr();
      }, 100);
    });
  }

  // Init when modals are shown
  $('#addRentalModal').on('shown.bs.modal', function () {
    setTimeout(() => {
      initSelect2('#addRentalTenantName', 'SelectTenantName', '#addRentalModal');
      initFlatpickr();
    }, 100);
  });
  $('#editRentalModal').on('shown.bs.modal', function () {
    setTimeout(() => {
      initSelect2('#editRentalTenantName', 'SelectTenantName', '#editRentalModal');
      initFlatpickr();
    }, 100);
  });

  // Re-init when Livewire triggers flatpickr event
  window.addEventListener('flatpickr', initFlatpickr);
</script>
@endsection
