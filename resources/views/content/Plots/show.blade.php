@extends('layouts/layoutMaster')

@section('title', 'عرض القطعة')

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

    @livewire('plots.show', ['Provinceid' => $Provinceid])

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script>
        async function printFiles(fileUrls) {
            for (const fileUrl of fileUrls) {
                try {
                    const fileExtension = fileUrl.split('.').pop().toLowerCase();
                    const isPDF = fileExtension === 'pdf';

                    if (isPDF) {
                        // طباعة ملفات PDF كما هي
                        await new Promise((resolve, reject) => {
                            printJS({
                                printable: fileUrl,
                                type: 'pdf',
                                onPrintDialogClose: resolve,
                                onError: reject
                            });
                        });
                    } else {
                        // طباعة الصور بحجم ورقة A4
                        await new Promise((resolve, reject) => {
                            // إنشاء عنصر صورة مؤقت
                            const img = new Image();
                            img.src = fileUrl;
                            img.onload = () => {
                                // إنشاء نافذة طباعة مؤقتة
                                const printWindow = window.open('', '_blank');
                                printWindow.document.write(`
                            <html>
                                <head>
                                    <title>طباعة</title>
                                    <style>
                                        body {
                                            margin: 0;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            height: 100vh;
                                        }
                                        img {
                                            max-width: 100%;
                                            max-height: 100%;
                                            width: auto;
                                            height: auto;
                                        }
                                        @media print {
                                            @page {
                                                size: A4;
                                                margin: 0;
                                            }
                                            img {
                                                width: 100%;
                                                height: auto;
                                            }
                                        }
                                    </style>
                                </head>
                                <body>
                                    <img src="${fileUrl}" alt="صورة للطباعة">
                                </body>
                            </html>
                        `);
                                printWindow.document.close();

                                // استدعاء الطباعة بعد تحميل النافذة
                                printWindow.onload = () => {
                                    printWindow.print();
                                    printWindow.close();
                                    resolve();
                                };
                            };
                            img.onerror = (error) => {
                                reject(`الصورة الثانية غير موجودة: ${error.message}`);
                            };
                        });
                    }
                } catch (error) {
                    alert(`الملف الثاني غير موجود: ${fileUrl} - ${error.message}`);
                }
            }
        }

        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    livewire.emit(eventName, e.target.value);
                });
            }
            // add and edit Branch
            initSelect2('#addPlotspecialized_department', 'SelectSpecializedDepartment', '#addplotModal');
            initSelect2('#editPlotspecialized_department', 'SelectSpecializedDepartment', '#editplotModal');
            window.livewire.on('select2', () => {
                initSelect2('#addPlotspecialized_department', 'SelectSpecializedDepartment',
                    '#addplotModal');
                initSelect2('#editPlotspecialized_department', 'SelectSpecializedDepartment',
                    '#editplotModal');
            });
        });

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

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

        window.addEventListener('success', event => {
            $('#addPlotModal').modal('hide');
            $('#editPlotModal').modal('hide');
            $('#removePlotModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })
        window.addEventListener('error', event => {
            $('#removePlotModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })
        })
    </script>
@endsection
