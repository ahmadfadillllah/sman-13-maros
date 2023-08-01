<div class="modal fade" id="kirimSurat{{ $s->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim Surat ke Siswa & Wali</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pelanggaran.send', $s->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nomor Surat</label>
                        <select class="default-select  form-control wide" name="nomorsurat_id" required>
                            <option>Pilih Nomor Surat</option>
                            @foreach ($nomor_surat as $item)
                            <option value="{{ $item->id }}">{{ $item->nomor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Panggil</label>
                        <input type="datetime-local" class="form-control input-default" name="tgl_panggil"required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
         </form>
        </div>
    </div>
</div>
