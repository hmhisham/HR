@extends('layouts/layoutMaster')

@section('title', 'القطع')

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

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-draw/v1.4.0/mapbox-gl-draw.css" rel="stylesheet">
@endsection

@section('content')

    @livewire('plots.plot')

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
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-draw/v1.4.0/mapbox-gl-draw.js"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script>
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
            initSelect2('#addPlotspecialized_department', 'SelectSpecializedDepartment', '#addPlotToProvinceModal');
            window.livewire.on('select2', () => {
                initSelect2('#addPlotspecialized_department', 'SelectSpecializedDepartment',
                    '#addPlotToProvinceModal');
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

        window.addEventListener('PositionModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addPlotToProvinceModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        document.addEventListener('livewire:load', function() {
            // استمع لحدث فتح النموذج
            const modal = document.getElementById('addPlotToProvinceModal');
            modal.addEventListener('shown.bs.modal', function() {
                initMap();
            });
        });

        /* function initMap() {
            mapboxgl.accessToken =
                'pk.eyJ1IjoibXVudGVkaGVyIiwiYSI6ImNtNm8yNndqNjE1aGMydHM4dmRpZmRoY3AifQ.4PkXyQ6-_zZgnHy8D7viYQ';

            const map = new mapboxgl.Map({
                container: 'map', // ID الخاص بالعنصر الذي سيعرض الخريطة
                style: 'mapbox://styles/mapbox/streets-v12', // نمط الخريطة
                center: [47.7836, 30.5081], // الموقع الافتراضي
                zoom: 15, // مستوى التكبير
            });

            let marker;

            // دالة لإضافة أو تحديث المؤشر
            function addOrUpdateMarker(lngLat) {
                if (!marker) {
                    // إذا لم يكن هناك مؤشر، أضف واحدًا جديدًا
                    marker = new mapboxgl.Marker({
                            draggable: true,
                        })
                        .setLngLat(lngLat)
                        .addTo(map);
                } else {
                    // إذا كان هناك مؤشر، حدّث موقعه
                    marker.setLngLat(lngLat);
                }

                // تحديث الخريطة للتركيز على الموقع الجديد
                map.flyTo({
                    center: lngLat,
                    zoom: 10,
                });
            }

            // تحديث المؤشر عند سحبه
            function onDragEnd() {
                const lngLat = marker.getLngLat();
                document.getElementById('latitude').value = lngLat.lat.toFixed(6);
                document.getElementById('longitude').value = lngLat.lng.toFixed(6);
            }

            // إضافة المؤشر عند النقر على الخريطة
            map.on('click', (e) => {
                const lngLat = e.lngLat;
                addOrUpdateMarker([lngLat.lng, lngLat.lat]);
                document.getElementById('latitude').value = lngLat.lat.toFixed(6);
                document.getElementById('longitude').value = lngLat.lng.toFixed(6);
            });

            // تهيئة المؤشر عند تحميل الخريطة
            map.on('load', () => {
                addOrUpdateMarker([47.7836, 30.5081]); // الموقع الافتراضي
            });

            // تحديث المؤشر عند إدخال قيم يدويًا
            document.getElementById('latitude').addEventListener('input', updateMarkerFromInputs);
            document.getElementById('longitude').addEventListener('input', updateMarkerFromInputs);

            function updateMarkerFromInputs() {
                const latitude = parseFloat(document.getElementById('latitude').value);
                const longitude = parseFloat(document.getElementById('longitude').value);

                if (!isNaN(latitude) && !isNaN(longitude)) {
                    addOrUpdateMarker([longitude, latitude]);
                }
            }
        } */

        function initMap() {
            mapboxgl.accessToken =
                'pk.eyJ1IjoibXVudGVkaGVyIiwiYSI6ImNtNm8yNndqNjE1aGMydHM4dmRpZmRoY3AifQ.4PkXyQ6-_zZgnHy8D7viYQ';
            const map = new mapboxgl.Map({
                container: 'map', // ID الخاص بالعنصر الذي سيعرض الخريطة
                style: 'mapbox://styles/mapbox/streets-v12', // نمط الخريطة
                center: [47.7836, 30.5081], // الموقع الافتراضي
                zoom: 10, // مستوى التكبير
            });

            // إضافة أزرار التكبير والتصغير
            const nav = new mapboxgl.NavigationControl();
            map.addControl(nav, 'top-right');

            // قائمة لتخزين العلامات (Markers)
            let markers = [];
            let points = [];

            // دالة لحساب المسافة بين نقطتين باستخدام صيغة Haversine
            function calculateDistance(coord1, coord2) {
                const earthRadiusKm = 6371; // نصف قطر الأرض بالكيلومترات
                const lat1 = toRadians(coord1[1]);
                const lon1 = toRadians(coord1[0]);
                const lat2 = toRadians(coord2[1]);
                const lon2 = toRadians(coord2[0]);
                const dLat = lat2 - lat1;
                const dLon = lon2 - lon1;
                const a =
                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(lat1) * Math.cos(lat2) * Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return earthRadiusKm * c; // المسافة بالكيلومترات
            }

            function toRadians(degrees) {
                return degrees * (Math.PI / 180);
            }

            // دالة لحساب المساحة بين النقاط باستخدام صيغة المساحة الجغرافية
            function calculateArea(points) {
                if (points.length < 3 || points[0][0] !== points[points.length - 1][0] || points[0][1] !== points[points
                        .length - 1][1]) {
                    return 0; // لا يمكن حساب المساحة إلا إذا كانت النقاط تشكل شكلًا مغلقًا
                }
                const earthRadiusKm = 6371; // نصف قطر الأرض بالكيلومترات
                let area = 0;
                for (let i = 0; i < points.length - 1; i++) {
                    const lat1 = toRadians(points[i][1]);
                    const lon1 = toRadians(points[i][0]);
                    const lat2 = toRadians(points[i + 1][1]);
                    const lon2 = toRadians(points[i + 1][0]);
                    area += (lon2 - lon1) * (2 + Math.sin(lat1) + Math.sin(lat2));
                }
                area = area * earthRadiusKm * earthRadiusKm / 2;
                return Math.abs(area); // المساحة بالكيلومتر المربع
            }

            // دالة لإضافة نقطة جديدة إلى القائمة وتحديث GeoJSON
            function addPoint(lngLat) {
                points.push(lngLat); // إضافة النقطة إلى القائمة

                // إنشاء علامة جديدة على الخريطة
                const marker = new mapboxgl.Marker({
                        draggable: true
                    })
                    .setLngLat(lngLat)
                    .addTo(map);

                // إضافة زر "X" للحذف
                const closeButton = document.createElement('button');
                closeButton.innerHTML = 'X';
                closeButton.style.position = 'absolute';
                closeButton.style.top = '-10px';
                closeButton.style.right = '-10px';
                closeButton.style.backgroundColor = 'red';
                closeButton.style.color = 'white';
                closeButton.style.border = 'none';
                closeButton.style.borderRadius = '50%';
                closeButton.style.cursor = 'pointer';
                marker.getElement().appendChild(closeButton);

                // إضافة مستمع لحذف النقطة عند الضغط على زر "X"
                closeButton.addEventListener('click', (e) => {
                    e.stopPropagation(); // منع انتشار الحدث إلى العلامة نفسها
                    removePoint(marker);
                });

                // إضافة مستمع لحدث السحب لتحديث الإحداثيات
                marker.on('dragend', () => {
                    const newLngLat = marker.getLngLat();
                    updateMarkerPosition(marker, newLngLat);
                });

                // إضافة مستمع لإظهار إحداثيات النقطة عند تمرير الماوس
                marker.getElement().addEventListener('mouseenter', () => {
                    const lngLat = marker.getLngLat();
                    showCoordinatesPopup(lngLat, marker);
                });

                marker.getElement().addEventListener('mouseleave', () => {
                    hideCoordinatesPopup(marker);
                });

                markers.push(marker); // تخزين العلامة في القائمة
                updateGeoJSON(); // تحديث GeoJSON لعرض النقاط والخطوط
            }

            // دالة لحذف النقطة
            function removePoint(marker) {
                const index = markers.indexOf(marker);
                if (index !== -1) {
                    markers.splice(index, 1); // حذف العلامة من القائمة
                    points.splice(index, 1); // حذف الإحداثيات من القائمة
                    marker.remove(); // إزالة العلامة من الخريطة
                    updateGeoJSON(); // تحديث GeoJSON
                }
            }

            // دالة لتحديث موقع العلامة وإعادة رسم GeoJSON
            function updateMarkerPosition(marker, newLngLat) {
                const index = markers.indexOf(marker); // الحصول على فهرس العلامة
                if (index !== -1) {
                    points[index] = [newLngLat.lng, newLngLat.lat]; // تحديث الإحداثيات
                    updateGeoJSON(); // تحديث GeoJSON
                }
            }

            // دالة لتحديث GeoJSON وإعادة رسم النقاط والخطوط
            function updateGeoJSON() {
                if (points.length < 2) {
                    return; // لا يمكن رسم خط إلا إذا كان هناك نقطتان على الأقل
                }

                // إنشاء بيانات GeoJSON للنقاط والخطوط
                const geojson = {
                    type: 'FeatureCollection',
                    features: [{
                            type: 'Feature',
                            geometry: {
                                type: 'LineString',
                                coordinates: points, // إحداثيات النقاط لرسم الخط
                            },
                            properties: {
                                isClosed: points.length > 2 && points[0][0] === points[points.length - 1][0] &&
                                    points[0][1] === points[points.length - 1][1],
                            },
                        },
                        ...points.map((point, index) => ({
                            type: 'Feature',
                            geometry: {
                                type: 'Point',
                                coordinates: point,
                            },
                            properties: {
                                title: `Point ${index + 1}`, // عنوان النقطة
                            },
                        })),
                    ],
                };

                // إضافة مضلع إذا كانت النقاط تشكل شكلًا مغلقًا
                if (geojson.features[0].properties.isClosed) {
                    geojson.features.push({
                        type: 'Feature',
                        geometry: {
                            type: 'Polygon',
                            coordinates: [points], // إحداثيات المضلع
                        },
                    });
                }

                // تحديث مصدر البيانات
                if (map.getSource('route')) {
                    map.getSource('route').setData(geojson);
                } else {
                    map.addSource('route', {
                        type: 'geojson',
                        data: geojson,
                    });

                    // إضافة طبقة للخطوط العادية
                    map.addLayer({
                        id: 'route-line',
                        type: 'line',
                        source: 'route',
                        paint: {
                            'line-color': '#FF0000', // لون الخط العادي
                            'line-width': 3, // عرض الخط
                        },
                        filter: ['==', '$type', 'LineString'],
                    });

                    // إضافة طبقة للخطوط الملونة (للأشكال المغلقة)
                    map.addLayer({
                        id: 'closed-route-line',
                        type: 'line',
                        source: 'route',
                        paint: {
                            'line-color': '#00FF00', // لون الخط الأخضر للأشكال المغلقة
                            'line-width': 5, // عرض الخط
                        },
                        filter: ['all', ['==', '$type', 'LineString'],
                            ['==', 'isClosed', true]
                        ],
                    });

                    // إضافة طبقة للنقاط
                    map.addLayer({
                        id: 'route-points',
                        type: 'circle',
                        source: 'route',
                        paint: {
                            'circle-radius': 6, // حجم الدائرة
                            'circle-color': '#007CBF', // لون الدائرة
                        },
                        filter: ['==', '$type', 'Point'],
                    });

                    // إضافة طبقة لتظليل المساحة إذا كانت النقاط تشكل شكلًا مغلقًا
                    map.addLayer({
                        id: 'area-fill',
                        type: 'fill',
                        source: 'route',
                        paint: {
                            'fill-color': '#007CBF', // لون التظليل
                            'fill-opacity': 0.3, // شفافية التظليل
                        },
                        filter: ['==', '$type', 'Polygon'],
                    });
                }

                // إظهار المسافات كنصوص على الخطوط
                showDistancesOnLines(points);

                // إظهار المساحة إذا كانت النقاط تشكل شكلًا مغلقًا
                if (geojson.features[0].properties.isClosed) {
                    const area = calculateArea(points).toFixed(2);
                    alert(`المساحة الكلية: ${area} كيلومتر مربع`);
                }
            }

            // دالة لحساب المسافات بين النقاط
            function calculateDistances(points) {
                const distances = [];
                for (let i = 0; i < points.length - 1; i++) {
                    const distance = calculateDistance(points[i], points[i + 1]);
                    distances.push(distance.toFixed(2)); // تقريب المسافة إلى رقمين عشريين
                }
                return distances;
            }

            // دالة لإظهار المسافات كنصوص على الخطوط
            function showDistancesOnLines(points) {
                // إزالة جميع النوافذ المنبثقة السابقة
                document.querySelectorAll('.mapboxgl-popup').forEach(popup => popup.remove());
                for (let i = 0; i < points.length - 1; i++) {
                    const midpoint = [
                        (points[i][0] + points[i + 1][0]) / 2,
                        (points[i][1] + points[i + 1][1]) / 2,
                    ];
                    const distance = calculateDistance(points[i], points[i + 1]).toFixed(2);
                    // إنشاء نافذة منبثقة لعرض المسافة
                    new mapboxgl.Popup()
                        .setLngLat(midpoint)
                        .setHTML(`${distance} km`)
                        .addTo(map);
                }
            }

            // دالة لإظهار إحداثيات النقطة عند تمرير الماوس
            function showCoordinatesPopup(lngLat, marker) {
                if (!marker.popup) {
                    marker.popup = new mapboxgl.Popup()
                        .setLngLat(lngLat)
                        .setHTML(`Lng: ${lngLat.lng.toFixed(6)}, Lat: ${lngLat.lat.toFixed(6)}`)
                        .addTo(map);
                }
            }

            // دالة لإخفاء إحداثيات النقطة عند مغادرة الماوس
            function hideCoordinatesPopup(marker) {
                if (marker.popup) {
                    marker.popup.remove();
                    marker.popup = null;
                }
            }

            // إضافة نقطة عند النقر على الخريطة
            map.on('click', (e) => {
                const lngLat = e.lngLat;
                addPoint([lngLat.lng, lngLat.lat]); // إضافة النقطة إلى القائمة
            });

            // تهيئة الخريطة
            map.on('load', () => {
                // إضافة مصدر بيانات فارغ في البداية
                map.addSource('route', {
                    type: 'geojson',
                    data: {
                        type: 'FeatureCollection',
                        features: [],
                    },
                });
            });
        }


        window.addEventListener('init-map', function() {
            initMap();
        });


    </script>
@endsection
