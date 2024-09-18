@extends('layouts/layoutMaster')
@section('title', 'Penalties')
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
@livewire('penalties.penaltie')


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

    window.addEventListener('PenaltieModalShow', event => {
        setTimeout(() => {
            $('#id').focus();
        }, 100);
    })

    window.addEventListener('success', event => {
        $('#addpenaltieModal').modal('hide');
        $('#editpenaltieModal').modal('hide');
        $('#removepenaltieModal').modal('hide');
        Toast.fire({
            icon: 'success'
            , title: event.detail.message
        })
    })
    window.addEventListener('error', event => {
        $('#removepenaltieModal').modal('hide');
        Toast.fire({
            icon: 'error'
            , title: event.detail.message
            , timer: 5000
        , })

    })

    /* الموظفين */
    $(document).ready(function() {
        window.initWorkerDrop = () => {
            $('#worker').select2({
                placeholder: 'حدد الموظف'
                , dropdownParent: $('#addpenaltieModal')
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
            $('#modalPenaltiep_issuing_authority').select2({
                placeholder: 'حدد الموظف', // Set placeholder text
                dropdownParent: $('#addpenaltieModal') // Parent modal for dropdown
            });
        }

        // Call initialization function
        initDepartmentDrop();

        // Emit change event to Livewire on selection change
        $('#modalPenaltiep_issuing_authority').on('change', function(e) {
            livewire.emit('Selectauthority', e.target.value); // Adjust event if needed
        });

        // Reinitialize select2 when Livewire triggers 'select2' event
        window.livewire.on('select2', () => {
            initDepartmentDrop();
        });
    });

</script>
@endsection
