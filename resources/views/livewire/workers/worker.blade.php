<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="WorkerSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        {{-- @can('worker-create')
                        <button wire:click='AddWorkerModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addworkerModal">أضــافــة</button>
                        @include('livewire.workers.add-worker')
                        @endcan --}}


                        @can('worker-create')
                        <a href="{{ Route('AddWorker') }}" class="mb-3 add-new btn btn-primary mb-md-0">أضــافــة</a>
                    @endcan


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

