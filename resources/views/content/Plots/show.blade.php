@extends('layouts/layoutMaster')

@section('title', 'عرض القطعة')

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

    <script src="https://cdn.jsdelivr.net/npm/pdf-lib/dist/pdf-lib.min.js"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script>
        async function printFiles(fileUrls) {
            // دالة مساعدة لتنسيق الأرقام وإضافة الأصفار
            function padZero(value, length = 2) {
                return String(value).padStart(length, '0');
            }

            // إنشاء نص أمان يتضمن ID المستخدم والتاريخ والوقت
            const now = new Date();
            const userId = '{{ Auth::id() }}'; // الحصول على ID المستخدم من Laravel
            const formattedDate =
                `${(userId)}${padZero(now.getDate())}${padZero(now.getMonth() + 1)}${String(now.getFullYear()).slice(-2)}${padZero(now.getHours())}${padZero(now.getMinutes())}`;
            const securityText = formattedDate;

            for (const fileUrl of fileUrls) {
                try {
                    const fileExtension = fileUrl.split('.').pop().toLowerCase();
                    const isPDF = fileExtension === 'pdf';

                    if (isPDF) {
                        // طباعة ملفات PDF بعد إضافة النص الأمني
                        await new Promise((resolve, reject) => {
                            fetch(fileUrl)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(`خطأ في تحميل ملف PDF: ${response.statusText}`);
                                    }
                                    return response.arrayBuffer();
                                })
                                .then(async (pdfData) => {
                                    try {
                                        // تحميل ملف PDF باستخدام pdf-lib
                                        const pdfDoc = await PDFLib.PDFDocument.load(pdfData);
                                        // إضافة النص الأمني لكل صفحة
                                        const pages = pdfDoc.getPages();
                                        pages.forEach(page => {
                                            const {
                                                width,
                                                height
                                            } = page.getSize();
                                            // إضافة النص الأمني في الجزء السفلي
                                            page.drawText(securityText, {
                                                x: 105, // المسافة من اليسار
                                                y: height - 64, // المسافة من الأعلى
                                                size: 12, // حجم الخط
                                            });
                                        });

                                        // حفظ ملف PDF المعدل
                                        const modifiedPdfBytes = await pdfDoc.save();
                                        const modifiedPdfBlob = new Blob([modifiedPdfBytes], {
                                            type: 'application/pdf'
                                        });
                                        const modifiedPdfUrl = URL.createObjectURL(modifiedPdfBlob);

                                        // طباعة الملف المعدل مباشرةً
                                        printJS({
                                            printable: modifiedPdfUrl,
                                            type: 'pdf',
                                            onPrintDialogClose: () => {
                                                console.log("تم إغلاق نافذة الطباعة.");
                                                URL.revokeObjectURL(
                                                    modifiedPdfUrl); // تنظيف الرابط المؤقت
                                                resolve();
                                            },
                                            onError: reject
                                        });
                                    } catch (error) {
                                        reject(`خطأ في معالجة ملف PDF: ${error.message}`);
                                    }
                                })
                                .catch(error => {
                                    reject(`خطأ في تحميل ملف PDF: ${error.message}`);
                                });
                        });
                    } else {
                        // طباعة الصور بحجم ورقة A4 مع إضافة النص الأمني
                        await new Promise((resolve, reject) => {
                            const img = new Image();
                            img.src = fileUrl;
                            img.onload = () => {
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
                                            position: relative;
                                        }
                                        img {
                                            max-width: 100%;
                                            max-height: 100%;
                                            width: auto;
                                            height: auto;
                                        }
                                        .security-footer {
                                            position: absolute;
                                            top: 70px; /* المسافة من الأعلى */
                                            left: 195px; /* المسافة من اليسار */
                                            transform: translateX(-50%);
                                            font-size: 16px;
                                            color: #000; /* أسود فقط */
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
                                            .security-footer {
                                                display: block;
                                            }
                                        }
                                    </style>
                                </head>
                                <body>
                                    <img src="${fileUrl}" alt="Image for printing">
                                    <div class="security-footer">${securityText}</div>
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
                                reject(`خطأ في تحميل الصورة: ${error.message}`);
                            };
                        });
                    }
                } catch (error) {
                    //alert(`خطأ في معالجة الملف: ${fileUrl} - ${error.message}`);
                    //alert(`الملف غير مرفق مع السند العقاري بالقطعة المراد طباعتها: ${fileUrl}`);
                    Toast.fire({
                        icon: 'error',
                        title: 'خطأ',
                        html: `الملف غير مرفق مع السند العقاري بالقطعة المراد طباعتها:<br>`,
                    });
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

        //jQuery لاختيار الكل
        $('#select-all-button').on('click', function() {
            fetch('/get-all-plots')
                .then(response => response.json())
                .then(data => {
                    Livewire.emit('selectAllRecords', data);
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
