<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الإعدادات <span class="mdi mdi-chevron-left mdi-24px"></span></span> العناوين الزظيفية
    </h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="JobtitleSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        @can('jobtitle-create')
                            <button wire:click='AddJobtitleModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addjobtitleModal">أضــافــة</button>
                            @include('livewire.jobtitles.modals.add-jobtitle')
                        @endcan
                    </div>
                </div>
            </div>
            @can('jobtitle-list')
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة</th>
                            <th Class="text-center">العنوان الوظيفي</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Jobtitles as $Jobtitle)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                {{-- <td Class="text-center">{{ $Jobtitle->grades_id }}</td> --}}
                                <td class="text-center">{{ $Jobtitle->Getgrade ? $Jobtitle->Getgrade->grades_name : '' }}
                                </td>
                                <td Class="text-center">{{ $Jobtitle->jobtitles_name }}</td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        @can('jobtitle-edit')
                                            <button wire:click="GetJobtitle({{ $Jobtitle->id }})"
                                                class="p-0 px-1 btn btn-text-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editjobtitleModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        @endcan
                                        @can('jobtitle-delete')
                                            <button wire:click="GetJobtitle({{ $Jobtitle->id }})"
                                                class="p-0 px-1 btn btn-text-danger waves-effect {{ $Jobtitle->active ? 'disabled' : '' }}"
                                                data-bs-toggle = "modal" data-bs-target="#removejobtitleModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>
                <!-- Modal -->
                @include('livewire.jobtitles.modals.edit-jobtitle')
                @include('livewire.jobtitles.modals.remove-jobtitle')
                <!-- Modal -->
            @endcan
        </div>
    </div>
</div>
