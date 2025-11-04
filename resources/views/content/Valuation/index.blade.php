@extends('layouts/layoutMaster')
@section('title', 'Valuation')

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
    </style>
@endsection

@section('content')
  @livewire('valuation.valuation', ['property_folder_id' => $property_folder_id ?? null])
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
  function initFlatpickr() {
    try {
      const commonOptions = {
        dateFormat: 'Y-m-d',
        locale: 'ar',
        disableMobile: true,
        allowInput: true
      };
      if (window.flatpickr) {
        const addEl = document.getElementById('addValuationDate');
        if (addEl) {
          if (addEl._flatpickr) addEl._flatpickr.destroy();
          window.flatpickr(addEl, commonOptions);
        }
        const editEl = document.getElementById('editValuationDate');
        if (editEl) {
          if (editEl._flatpickr) editEl._flatpickr.destroy();
          window.flatpickr(editEl, commonOptions);
        }
      }
    } catch (e) {
      console.error('Flatpickr init error', e);
    }
  }

  // Initial init
  initFlatpickr();

  // Re-init after Livewire updates
  if (window.Livewire) {
    Livewire.hook('message.processed', () => {
      setTimeout(() => {
        initFlatpickr();
      }, 100);
    });
  }

  // Init when modals are shown
  $('#addValuationModal').on('shown.bs.modal', function () {
    setTimeout(() => {
      initFlatpickr();
    }, 100);
  });
  $('#editValuationModal').on('shown.bs.modal', function () {
    setTimeout(() => {
      initFlatpickr();
    }, 100);
  });

  // Re-init when Livewire triggers flatpickr event
  window.addEventListener('flatpickr', initFlatpickr);
</script>
@endsection

