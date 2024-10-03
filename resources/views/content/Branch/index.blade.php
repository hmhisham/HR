
@extends('layouts/layoutMaster')
@section('title', 'Branch')
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
@livewire('branch.branc')


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
        /* addLinkage */
        $(document).ready(function() {
            window.initAddLinkageDrop = () => {
                $('#addLinkage').select2({
                    placeholder: 'حدد الارتباط',
                    dropdownParent: $('#addbrancModal')
                })
            }
            initAddLinkageDrop();
            $('#addLinkage').on('change', function(e) {
                livewire.emit('GetLinkage', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAddLinkageDrop();
            });
        });


        /* addSection */
        $(document).ready(function() {
            window.initAddSectionDrop = () => {
                $('#addSection').select2({
                    placeholder: 'حدد القسم',
                    dropdownParent: $('#addbrancModal')
                })
            }
            initAddSectionDrop();
            $('#addSection').on('change', function(e) {
                livewire.emit('GetSection', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAddSectionDrop();
            });
        });
        /* editLinkage */
        $(document).ready(function() {
            window.initEditLinkageDrop = () => {
                $('#editLinkage').select2({
                    placeholder: 'حدد الارتباط',
                    dropdownParent: $('#editbrancModal')
                })
            }
            initEditLinkageDrop();
            $('#editLinkage').on('change', function(e) {
                livewire.emit('GetLinkage', e.target.value)
            });
            window.livewire.on('select2', () => {
                initEditLinkageDrop();
            });
        });
        /* editSection */
        $(document).ready(function() {
            window.initEditSectionDrop = () => {
                $('#editSection').select2({
                    placeholder: 'حدد القسم',
                    dropdownParent: $('#editbrancModal')
                })
            }
            initEditSectionDrop();
            $('#editSection').on('change', function(e) {
                livewire.emit('GetSection', e.target.value)
            });
            window.livewire.on('select2', () => {
                initEditSectionDrop();
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

        window.addEventListener('BrancModalShow', event => {
            setTimeout(() => {
             $('#id').focus();
               }, 100);
        })

        window.addEventListener('success', event => {
            $('#addbrancModal').modal('hide');
            $('#editbrancModal').modal('hide');
            $('#removebrancModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removebrancModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
