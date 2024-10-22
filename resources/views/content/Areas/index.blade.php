@extends('layouts/layoutMaster')
@section('title', 'Areas')
@section('vendor-style')
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel ="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
@endsection

@section('content')

    @livewire('areas.area')

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
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-user-list.js') }}"></script>
    <script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script>
        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

        function onlyArabicKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            // نطاق رموز الحروف العربية والفراغ
            if ((ASCIICode >= 1569 && ASCIICode <= 1610) || ASCIICode === 32) {
                return true;
            }
            return false;
        }

        /* addGovernorate */
        $(document).ready(function() {
            window.initaddDistrictsDrop = () => {
                $('#addGovernorate').select2({
                    placeholder: 'حدد المحافظة',
                    dropdownParent: $('#addareaModal')
                })
            }
            initaddDistrictsDrop();
            $('#addGovernorate').on('change', function(e) {
                livewire.emit('chooseGovernorate', e.target.value)
            });
            window.livewire.on('select2', () => {
                initaddDistrictsDrop();
            });
        });
        /* addDistrict */
        $(document).ready(function() {
            window.initaddDistrictDrop = () => {
                $('#addDistrict').select2({
                    placeholder: 'حدد القضاء',
                    dropdownParent: $('#addareaModal')
                })
            }
            initaddDistrictDrop();
            $('#addDistrict').on('change', function(e) {
                livewire.emit('chooseDistrict', e.target.value)
            });
            window.livewire.on('select2', () => {
                initaddDistrictDrop();
            });
        });

        /* editGovernorate */
        $(document).ready(function() {
            window.initeditDistrictsDrop = () => {
                $('#editGovernorate').select2({
                    placeholder: 'حدد المحافظة',
                    dropdownParent: $('#editareaModal')
                })
            }
            initeditDistrictsDrop();
            $('#editGovernorate').on('change', function(e) {
                livewire.emit('chooseGovernorate', e.target.value)
            });
            window.livewire.on('select2', () => {
                initeditDistrictsDrop();
            });
        });
        /* editDistrict */
        $(document).ready(function() {
            window.initeditDistrictDrop = () => {
                $('#editDistrict').select2({
                    placeholder: 'حدد القضاء',
                    dropdownParent: $('#editareaModal')
                })
            }
            initeditDistrictDrop();
            $('#editDistrict').on('change', function(e) {
                livewire.emit('chooseDistrict', e.target.value)
            });
            window.livewire.on('select2', () => {
                initeditDistrictDrop();
            });
        });

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

        window.addEventListener('AreaModalShow', event => {
            $('#modalAreasgovernorate_id').focus();
        })

        window.addEventListener('success', event => {
            $('#addareaModal').modal('hide');
            $('#editareaModal').modal('hide');
            $('#removeareaModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })
        window.addEventListener('error', event => {
            $('#removareaModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
