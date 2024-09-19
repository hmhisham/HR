@extends('layouts/layoutMaster')
@section('title', 'Wives')
@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/select2/select2.css') }}" />
<link rel=" stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel=" stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
@endsection
@section('content')
@livewire('wives.wive')


@endsection

@section('vendor-script')
<script src=" {{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src=" {{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
@endsection

@section('page-script')
<script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
<script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
<script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true
        , position: 'top-start'
        , showConfirmButton: false
        , timer: 3000
        , timerProgressBar: true
        , didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    window.addEventListener('WiveModalShow', event => {
        setTimeout(() => {
            $('#id').focus();
        }, 100);
    })

    window.addEventListener('success', event => {
        $('#addwiveModal').modal('hide');
        $('#editwiveModal').modal('hide');
        $('#removewiveModal').modal('hide');
        Toast.fire({
            icon: 'success'
            , title: event.detail.message
        })
    })

    /* الجهات  */

    $(document).ready(function() {
    // Initialize the select2 dropdown for selecting the organization name
    window.initDepartmentDrop = () => {
        $('#modalThanksgrantor').select2({
            placeholder: 'حدد الموظف',
            dropdownParent: $('#addthankModal')
        });
    };

    // Call the initialization function
    initDepartmentDrop();

    // Emit the Livewire event when a new organization is selected
    $('#modalThanksgrantor').on('change', function(e) {
        livewire.emit('SelectGrantor', e.target.value);
    });

    // Re-initialize select2 when necessary (e.g., after Livewire updates)
    window.livewire.on('select2', () => {
        initDepartmentDrop();
    });

    // Listen for error events and display a Toast message
    window.addEventListener('error', event => {
        $('#removewiveModal').modal('hide'); // Hide the modal on error
        Toast.fire({
            icon: 'error',
            title: event.detail.message,
            timer: 5000
        });
    });
});


</script>
@endsection
