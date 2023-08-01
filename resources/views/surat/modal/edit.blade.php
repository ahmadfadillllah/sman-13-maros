<div class="modal fade" id="editSurat{{ $s->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Nomor Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('nomor_surat.update', $s->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nomor Surat</label>
                        <input type="text" class="form-control input-default" value="{{ $s->nomor }}" name="nomor" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
         </form>
        </div>
    </div>
</div>
