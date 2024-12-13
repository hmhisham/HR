<!-- Add certifi Modal -->
<div wire:ignore.self class="modal fade" id="showCertifiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">عرض الشهادات</h3>
                    <p>نافذة الشهادات </p>
                </div>

                <hr class="mt-n2">

                @if (!empty($Worker) and $Worker->GetCertific->count() > 0)
                    <table class="table w-100" border="1">
                        <thead class="table-light">
                            <th class="">رقم الوثيقة</th>
                            <th class="">تاريخ الوثيقة</th>
                            <th class="">الشهادة</th>
                            <th class="">التخصص</th>
                            <th class="text-center">العملية</th>
                        </thead>
                        <tbody>
                            @foreach ($Worker->GetCertific as $Certific)
                                <tr>
                                    <td>{{ $Certific->document_number }}</td>
                                    <td>{{ $Certific->document_date }}</td>
                                    <td>{{ $Certific->Getcertificate->certificates_name }}</td>
                                    <td>{{ $Certific->Getspecialization->specializations_name }}</td>
                                    <td class="text-center">
                                        @can('branc-edit')
                                            <button wire:click="Getcertifi({{ $Worker->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editcertifiModal">
                                                <i class="tf-icons mdi mdi-pencil mdi-24px"></i>
                                            </button>
                                        @endcan
                                        @can('branc-delete')
                                            <button wire:click="Getcertifi({{ $Worker->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Worker->active ? 'disabled' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#removebrancModal">
                                                <i class="tf-icons mdi mdi-delete-outline mdi-24px"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="text-center">لا توجد شهادات مضافة</h1>

                @endif

                <hr class="my-0">

                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Add certifi Modal -->
