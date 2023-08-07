<div class="modal fade" id="report">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Masukkan Periode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('pelanggaran.report') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Awal Tgl Kejadian</label>
                        <input type="date" class="form-control input-default" name="awal_tgl" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Akhir Tgl Kejadian</label>
                        <input type="date" class="form-control input-default" name="akhir_tgl" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" target="_blank" class="btn btn-primary">Cari</button>
                </div>
         </form>
        </div>
    </div>
</div>
