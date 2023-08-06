<div class="modal fade" id="editPelanggaran{{ $p->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pelanggaran.update', $p->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis</label>
                        <select class="default-select  form-control wide" name="jenis" required>
                            <option value="{{ $p->jenis }}">{{ $p->jenis }}</option>
                            <option value="Ringan">Ringan</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Berat">Berat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Pelanggaran</label>
                        <input type="text" class="form-control input-default" name="pelanggaran" value="{{ $p->pelanggaran }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Kejadian</label>
                        <input type="datetime-local" class="form-control input-default" name="tgl_kejadian" value="{{ $p->tgl_kejadian }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Keterangan</label>
                        <textarea class="form-txtarea form-control" rows="8" name="keterangan">{{ $p->keterangan }}</textarea>
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
