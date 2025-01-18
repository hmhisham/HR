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
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script>
        function printImages(deedImageUrl, mapImageUrl) {
            // إنشاء iframe مخفي
            const iframe = document.createElement('iframe');
            iframe.style.position = 'fixed';
            iframe.style.top = '-1000px'; // إخفاء iframe خارج الشاشة
            iframe.style.left = '-1000px';
            iframe.style.width = '1px';
            iframe.style.height = '1px';
            iframe.style.border = 'none';

            // محتوى HTML للصور مع علامة مائية
            const content = `
        <html>
            <head>
                <title>طباعة الصور</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .image-container {
                        position: relative;
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    img {
                        max-width: 100%;
                        height: auto;
                    }
                    .watermark {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        font-size: 40px;
                        font-weight: bold;
                        color: rgba(0, 0, 0, 0.2); /* لون شبه شفاف */
                        pointer-events: none; /* تجنب التفاعل مع العلامة المائية */
                        user-select: none; /* منع تحديد النص */
                    }
                </style>
            </head>
            <body>
                <div class="image-container">
                    <h2>صورة السند</h2>
                    <div style="position: relative;">
                        <img src="${deedImageUrl}" alt="صورة السند">
                        <div class="watermark">خاص بشعبة الخرائط والمرتسمات</div>
                    </div>
                </div>
                <div class="image-container">
                    <h2>صورة الخريطة</h2>
                    <div style="position: relative;">
                        <img src="${mapImageUrl}" alt="صورة الخريطة">
                        <div class="watermark">خاص بشعبة الخرائط والمرتسمات</div>
                    </div>
                </div>
            </body>
        </html>
    `;

            // إضافة iframe إلى body
            document.body.appendChild(iframe);

            // كتابة المحتوى في iframe
            iframe.contentDocument.write(content);
            iframe.contentDocument.close();

            // طباعة iframe بعد تحميل الصور
            iframe.onload = function() {
                iframe.contentWindow.print();
                document.body.removeChild(iframe); // إزالة iframe بعد الطباعة
            };
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
