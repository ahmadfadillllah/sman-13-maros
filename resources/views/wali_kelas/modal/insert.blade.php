<div class="modal fade" id="insertWali">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Wali Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('wali_kelas.insert') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Wali</label>
                        <input type="text" class="form-control input-default" name="nama_wali" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="default-select  form-control wide" name="kelas_id" required>
                            <option>Pilih Kelas</option>
                            @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col-xl-4 col-xxl-6 col-6">
                                <div class="form-check custom-checkbox mb-3 checkbox-primary">
                                    <input type="radio" class="form-check-input" id="customRadioBox1" name="jenis_kelamin" value="Laki-laki">
                                    <label class="form-check-label" for="customRadioBox1" >Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-xxl-6 col-6">
                                <div class="form-check custom-checkbox mb-3 checkbox-secondary">
                                    <input type="radio" class="form-check-input" id="customRadioBox2" name="jenis_kelamin" value="Perempuan">
                                    <label class="form-check-label" for="customRadioBox2" >Perempuan</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control input-default" name="tempat_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control input-default" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No. WhatsApp (harus aktif)</label>
                        <br>
                        <a href="javascript:void(0)" class="badge badge-rounded badge-outline-primary">awali dengan angka 62</a>
                        <input type="number" class="form-control input-default" name="no_wa" placeholder="62xxxxxxxxx" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control input-default" name="alamat" required>
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
