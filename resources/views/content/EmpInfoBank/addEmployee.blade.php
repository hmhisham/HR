@extends('layouts/layoutMaster')

@section('title', 'اضافة الموظفين')

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
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />

    <style>
        .sticky-button {
            text-decoration: none;
            justify-content: center;
            flex-direction: row-reverse;
            box-shadow: none;
            align-items: center;
            text-align: center;
            position: fixed;
            top: 70px;
            left: 134px;
            transform: translateX(-50%);
            z-index: 1000;
        }
    </style>
@endsection

@section('content')

    @livewire('emp-info-bank.add-employee')

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
    <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script src="{{asset('assets/js/form-wizard-numbered.js')}}"></script>
    <script src="{{asset('assets/js/form-wizard-validation.js')}}"></script>

    <script>
        function onlyNumberKey(evt) {
			// Only ASCII character in that range allowed
			var ASCIICode = (evt.which) ? evt.which : evt.keyCode
			if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57) && (ASCIICode < 45 || ASCIICode > 47))
				return false;
			return true;
		}

        $(document).ready(function() {
            window.initDateBirthDrop=()=>{
                $('#DateBirth').flatpickr({
                    placeholder: 'تاريخ التولد'
                })
            }
            initDateBirthDrop();
            $('#DateBirth').on('change', function (e) {
                livewire.emit('DateBirth', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initDateBirthDrop();
            });
        });

        $(document).ready(function() {
            window.initDateIssueIdDrop=()=>{
                $('#DateIssueId').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initDateIssueIdDrop();
            $('#DateIssueId').on('change', function (e) {
                livewire.emit('DateIssueId', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initDateIssueIdDrop();
            });
        });
        $(document).ready(function() {
            window.initEndDateIdDrop=()=>{
                $('#EndDateId').flatpickr({
                    placeholder: 'تاريخ الانتهاء'
                })
            }
            initEndDateIdDrop();
            $('#EndDateId').on('change', function (e) {
                livewire.emit('EndDateId', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initEndDateIdDrop();
            });
        });
        $(document).ready(function() {
            window.initDateIssueCertDrop=()=>{
                $('#DateIssueCert').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initDateIssueCertDrop();
            $('#DateIssueCert').on('change', function (e) {
                livewire.emit('DateIssueCert', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initDateIssueCertDrop();
            });
        });
        $(document).ready(function() {
            window.initEndDateCertDrop=()=>{
                $('#EndDateCert').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initEndDateCertDrop();
            $('#EndDateCert').on('change', function (e) {
                livewire.emit('EndDateCert', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initEndDateCertDrop();
            });
        });
        $(document).ready(function() {
            window.initDateIssueCardDrop=()=>{
                $('#DateIssueCard').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initDateIssueCardDrop();
            $('#DateIssueCard').on('change', function (e) {
                livewire.emit('DateIssueCard', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initDateIssueCardDrop();
            });
        });
        $(document).ready(function() {
            window.initEndDateCardDrop=()=>{
                $('#EndDateCard').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initEndDateCardDrop();
            $('#EndDateCard').on('change', function (e) {
                livewire.emit('EndDateCard', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initEndDateCardDrop();
            });
        });
        $(document).ready(function() {
            window.initDateIssueDrivingDrop=()=>{
                $('#DateIssueDriving').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initDateIssueDrivingDrop();
            $('#DateIssueDriving').on('change', function (e) {
                livewire.emit('DateIssueDriving', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initDateIssueDrivingDrop();
            });
        });
        $(document).ready(function() {
            window.initEndDateDrivingDrop=()=>{
                $('#EndDateDriving').flatpickr({
                    placeholder: 'تاريخ الاصدار'
                })
            }
            initEndDateDrivingDrop();
            $('#EndDateDriving').on('change', function (e) {
                livewire.emit('EndDateDriving', e.target.value)
            });
            window.livewire.on('flatpickr',()=>{
                initEndDateDrivingDrop();
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

        window.addEventListener('EmployeeModalShow', event => {
            setTimeout(() => {
                $('#modalEmployeeJobNumber').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addemployeeModal').modal('hide');
            $('#editEmployeeModal').modal('hide');
            $('#removeEmployeeModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })

        window.addEventListener('error', event => {
            $('#removeEmployeeModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })
        })
    </script>
@endsection
