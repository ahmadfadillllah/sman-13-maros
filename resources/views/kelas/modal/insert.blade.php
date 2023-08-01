<div class="modal fade" id="insertKelas">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('kelas.insert') }}" method="POST">
            @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Nama Kelas</label>
                            <input type="text" class="form-control input-default" name="nama_kelas">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
         </form>
        </div>
    </div>
</div>
