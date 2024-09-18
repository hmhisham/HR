@extends('layouts/layoutMaster')
@section('title', 'Thanks')






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
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

@livewire('thanks.thank')

@endsection

@section('vendor-script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('page-script')
<script src="{{ asset('assets/js/app-user-list.js') }}"></script>
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>
<script>
    //	لجعل الـ text يقبل ارقام فقط
    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57) && (ASCIICode < 45 || ASCIICode > 47))
            return false;
        return true;
    }

    /* الموظفين */
    $(document).ready(function() {
        window.initWorkerDrop = () => {
            $('#worker').select2({
                placeholder: 'حدد الموظف'
                , dropdownParent: $('#addthankModal')
            })
        }
        initWorkerDrop();
        $('#worker').on('change', function(e) {
            livewire.emit('SelectWorker', e.target.value)
        });
        window.livewire.on('select2', () => {
            initWorkerDrop();
        });
    });

    /* الجهات  */

    $(document).ready(function() {
        // Initialize select2 for the grantor field
        window.initDepartmentDrop = () => {
            $('#modalThanksgrantor').select2({
                placeholder: 'حدد الموظف', // Set placeholder text
                dropdownParent: $('#addthankModal') // Parent modal for dropdown
            });
        }

        // Call initialization function
        initDepartmentDrop();

        // Emit change event to Livewire on selection change
        $('#modalThanksgrantor').on('change', function(e) {
            livewire.emit('SelectGrantor', e.target.value); // Adjust event if needed
        });

        // Reinitialize select2 when Livewire triggers 'select2' event
        window.livewire.on('select2', () => {
            initDepartmentDrop();
        });
    });


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
    });

    window.addEventListener('ThankModalShow', event => {
        setTimeout(() => {
            $('#id').focus();
        }, 100);
    });

    window.addEventListener('success', event => {
        $('#addthankModal').modal('hide');
        $('#editthankModal').modal('hide');
        $('#removethankModal').modal('hide');
        Toast.fire({
            icon: 'success'
            , title: event.detail.message
        });
    });

    window.addEventListener('error', event => {
        $('#removethankModal').modal('hide');
        Toast.fire({
            icon: 'error'
            , title: event.detail.message
            , timer: 5000
        , });
    });

</script>

@endsection
