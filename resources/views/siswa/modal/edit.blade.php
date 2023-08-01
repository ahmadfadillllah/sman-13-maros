<div class="modal fade" id="editSiswa{{ $s->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('siswa.update', $s->id ) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control input-default" name="nama_siswa" value="{{ $s->nama_siswa }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="default-select  form-control wide" name="kelas_id" required>
                            <option value="{{ $s->kelas->id }}">{{ $s->kelas->nama_kelas }}</option>
                            @foreach ($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">No Induk Siswa</label>
                        <input type="text" class="form-control input-default" name="nis" value="{{ $s->nis }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="default-select  form-control wide" name="jenis_kelamin" required>
                            <option value="{{ $s->jenis_kelamin }}" selected>{{ $s->jenis_kelamin }}</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control input-default" name="tempat_lahir" value="{{ $s->tempat_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control input-default" name="tanggal_lahir" value="{{ $s->tanggal_lahir }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No. WhatsApp (harus aktif)</label>
                        <br>
                        <a href="javascript:void(0)" class="badge badge-rounded badge-outline-primary">awali dengan angka 62</a>
                        <input type="number" class="form-control input-default" name="no_wa" value="{{ $s->no_wa }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Nama Orang Tua/Wali</label>
                        <input type="text" class="form-control input-default" name="orang_tua" value="{{ $s->orang_tua }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">No. WhatsApp Orang Tua/Wali (harus aktif)</label>
                        <br>
                        <a href="javascript:void(0)" class="badge badge-rounded badge-outline-primary">awali dengan angka 62</a>
                        <input type="number" class="form-control input-default" name="no_wa_ortu" value="{{ $s->no_wa_ortu }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control input-default" name="alamat" value="{{ $s->alamat }}" required>
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
