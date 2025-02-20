@extends('layouts/layoutMaster')

@section('title', 'عرض السند العقاري')

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
@endsection

@section('content')

    @livewire('realities.show', ['Provinceid' => $Provinceid, 'Plotid' => $Plotid])

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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/pdf-lib/dist/pdf-lib.min.js"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script>
        function printFile(fileUrl) {
            const fileExtension = fileUrl.split('.').pop().toLowerCase();
            const isPDF = fileExtension === 'pdf';

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

            if (isPDF) {
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

                                // إضافة النص الأمني في الجزء السفلي (بدون تنسيقات)
                                page.drawText(securityText, {
                                    x: 105, // المسافة من اليسار
                                    y: height -
                                        64, // المسافة من الأعلى (لضمان ظهور النص في الجزء السفلي)
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
                                    URL.revokeObjectURL(modifiedPdfUrl); // تنظيف الرابط المؤقت
                                },
                                onError: function(error) {
                                    alert("خطأ في طباعة ملف PDF: " + error.message);
                                }
                            });
                        } catch (error) {
                            alert("خطأ في معالجة ملف PDF: " + error.message);
                        }
                    })
                    .catch(error => {
                        alert("خطأ في تحميل ملف PDF: " + error.message);
                    });
            } else {
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
                                top: 70px;
                                left: 195px;
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
                    printWindow.onload = () => {
                        printWindow.print();
                        printWindow.close();
                    };
                };
                img.onerror = (error) => {
                    //alert(`خطأ في تحميل الصورة: ${error.message}`);
                    Toast.fire({
                        icon: 'error',
                        title: 'خطأ',
                        html: `الملف غير مرفق مع السند العقاري المراد طباعته:<br>`,
                    });
                };
            }
        }

        $(document).ready(function() {
            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    placeholder: 'التاريخ',
                    altInput: true,
                    allowInput: true,
                    dateFormat: "Y-m",
                    altFormat: "F Y",
                    yearSelectorType: "input",
                    locale: {
                        months: {
                            shorthand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                                'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                            ],
                            longhand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                                'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                            ]
                        }
                    },
                    plugins: [
                        new monthSelectPlugin({
                            shorthand: true,
                            dateFormat: "Y-m",
                            altFormat: "F Y",
                            theme: "light"
                        })
                    ],
                    onChange: function(selectedDates, dateStr, instance) {
                        livewire.emit(eventName, dateStr);
                    }
                });
            }
            initFlatpickr('#addDate', 'updateDate', '#addRealitieToPlotModal');
            initFlatpickr('#editDate', 'updateDate', '#editRealitieToPlotModal');
            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addDate', 'updateDate', '#addRealitieToPlotModal');
                initFlatpickr('#editDate', 'updateDate', '#editRealitieToPlotModal');
            });
        });

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
            initSelect2('#addRealitiegovernorate', 'SelectGovernorate', '#addRealitieModal');
            initSelect2('#editRealitiegovernorate', 'SelectGovernorate', '#editRealitieModal');
            initSelect2('#addRealitiedistrict', 'SelectDistrict', '#addRealitieModal');
            initSelect2('#editRealitiedistrict', 'SelectDistrict', '#editRealitieModal');
            initSelect2('#addRealitieproperty_type', 'SelectPropertyType', '#addRealitieModal');
            initSelect2('#editRealitieproperty_type', 'SelectPropertyType', '#editRealitieModal');
            initSelect2('#addRealitiepropertycategory_id', 'SelectPropertycategoryId', '#addRealitieModal');
            initSelect2('#editRealitiepropertycategory_id', 'SelectPropertycategoryId', '#editRealitieModal');

            window.livewire.on('select2', () => {
                initSelect2('#addRealitiegovernorate', 'SelectGovernorate', '#addRealitieModal');
                initSelect2('#editRealitiegovernorate', 'SelectGovernorate', '#editRealitieModal');
                initSelect2('#addRealitiedistrict', 'SelectDistrict', '#addRealitieModal');
                initSelect2('#editRealitiedistrict', 'SelectDistrict', '#editRealitieModal');
                initSelect2('#addRealitieproperty_type', 'SelectPropertyType', '#addRealitieModal');
                initSelect2('#editRealitieproperty_type', 'SelectPropertyType', '#editRealitieModal');
                initSelect2('#addRealitiepropertycategory_id', 'SelectPropertycategoryId',
                    '#addRealitieModal');
                initSelect2('#editRealitiepropertycategory_id', 'SelectPropertycategoryId',
                    '#editRealitieModal');
            });
        });

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

        function onlyNumberKey1(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;

            // Allow numbers (0-9) and dot (.)
            if ((ASCIICode < 48 || ASCIICode > 57) && ASCIICode !== 46) {
                return false;
            }
            return true;
        }

        function onlyArabicKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            // نطاق رموز الحروف العربية والفراغ
            if ((ASCIICode >= 1569 && ASCIICode <= 1610) || (ASCIICode >= 48 && ASCIICode <= 57) || ASCIICode === 32) {
                return true;
            }
            return false;
        }

        /*  //اختبار الحقل ان يكون مرتبتين فقط ولا يتجاوز 99 متر
         function validateMeterInput(evt) {
             const input = evt.target;
             if (input.value.length > 2) {
                 input.value = input.value.slice(0, 2);
             }
         }
         //اختبار الحقل ان يكون مرتبتين فقط ولا يتجاوز 25 اولك
         function validateOlokInput(evt) {
             const input = evt.target;
             let value = parseInt(input.value);
             if (input.value.length > 2 || value > 25) {
                 input.value = value.toString().slice(0, 2);
             }
             if (value > 25) {
                 input.value = 25;
             }
         } */

        //jQuery لاختيار الكل
        $('#select-all-button').on('click', function() {
            fetch('/get-all-realities')
                .then(response => response.json())
                .then(data => {
                    Livewire.emit('selectAllRecords', data);
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

        window.addEventListener('RealitieModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addRealitieToPlotModal').modal('hide');
            $('#addRealitieModal').modal('hide');
            $('#editRealitieModal').modal('hide');
            $('#deleteRealitieModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        window.addEventListener('error', event => {
            $('#deleteRealitieModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })
        })
    </script>
@endsection
