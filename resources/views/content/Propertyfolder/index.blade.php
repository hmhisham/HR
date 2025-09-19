@extends('layouts/layoutMaster')
@section('title', 'Propertyfolder')
@section('vendor-style')
    <link rel="stylesheet"href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel = "stylesheet"href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
@endsection
@section('content')
    @livewire('propertyfolder.propertyfolde')

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
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        window.addEventListener('PropertyfoldeModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addpropertyfoldeModal').modal('hide');
            $('#editpropertyfoldeModal').modal('hide');
            $('#removepropertyfoldeModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })




        window.addEventListener('error', event => {
            $('#removepropertyfoldeModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })



        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    console.log(`Value changed to: ${e.target.value}`);
                    livewire.emit(eventName, e.target.value);
                });
            }
            // add and edit Provinces, Property Types, and Property Descriptions
            initSelect2('#addPropertyfoldeid_property_location', 'SelectIdPropertyLocation', '#addpropertyfoldeModal');
            initSelect2('#editPropertyfoldeid_property_location', 'SelectIdPropertyLocation', '#editpropertyfoldeModal');
            initSelect2('#addPropertyfoldeid_property_type', 'SelectIdPropertyType', '#addpropertyfoldeModal');
            initSelect2('#editPropertyfoldeid_property_type', 'SelectIdPropertyType', '#editpropertyfoldeModal');
            initSelect2('#addPropertyfoldeid_property_description', 'SelectIdPropertyDescription', '#addpropertyfoldeModal');
            initSelect2('#editPropertyfoldeid_property_description', 'SelectIdPropertyDescription', '#editpropertyfoldeModal');
            // Province dropdown
            initSelect2('#modalPropertyfoldedistrict_name', 'SelectDistrictName', '#addpropertyfoldeModal');
            window.livewire.on('select2', () => {
                console.log("Reinitializing Select2");
                initSelect2('#addPropertyfoldeid_property_location', 'SelectIdPropertyLocation', '#addpropertyfoldeModal');
                initSelect2('#editPropertyfoldeid_property_location', 'SelectIdPropertyLocation', '#editpropertyfoldeModal');
                initSelect2('#addPropertyfoldeid_property_type', 'SelectIdPropertyType', '#addpropertyfoldeModal');
                initSelect2('#editPropertyfoldeid_property_type', 'SelectIdPropertyType', '#editpropertyfoldeModal');
                initSelect2('#addPropertyfoldeid_property_description', 'SelectIdPropertyDescription', '#addpropertyfoldeModal');
                initSelect2('#editPropertyfoldeid_property_description', 'SelectIdPropertyDescription', '#editpropertyfoldeModal');
                // Province dropdown
                initSelect2('#modalPropertyfoldedistrict_name', 'SelectDistrictName', '#addpropertyfoldeModal');
            });
        });
    </script>
@endsection
