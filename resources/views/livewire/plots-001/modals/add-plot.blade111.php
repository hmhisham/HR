<div wire:ignore.self class="modal fade" id="addplotModal{{ $Province->id }}" tabindex="-1" role="dialog" aria-labelledby="addPlotModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlotModalLabel">Add New Plot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ $Province->id }}
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="plotName">Plot Name</label>
                        <input type="text" class="form-control" id="plotName" placeholder="Enter plot name">
                    </div>
                    <div class="form-group">
                        <label for="plotSize">Plot Size</label>
                        <input type="text" class="form-control" id="plotSize" placeholder="Enter plot size">
                    </div>
                    <div class="form-group">
                        <label for="plotLocation">Plot Location</label>
                        <input type="text" class="form-control" id="plotLocation" placeholder="Enter plot location">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
