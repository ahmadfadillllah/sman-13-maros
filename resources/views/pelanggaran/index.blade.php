@include('dashboard.layout.head')
@include('dashboard.layout.chatbox')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="heading mb-0">Daftar Siswa</h4>
                @if (Auth::user()->role == 'admin')
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#report">Report</button>
                @include('pelanggaran.modal.report')
                @endif
            </div>
            <div class="col-xl-12 active-p">
                @include('notif.info')
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-colm" role="tabpanel" aria-labelledby="pills-colm-tab">
                        <div class="card">
                            <div class="card-body px-0">
                                <div class="table-responsive active-projects user-tbl  dt-filter">
                                    <table id="user-tbl" class="table shorting">

                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Jumlah Pelanggaran</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $s)
                                            @include('pelanggaran.modal.kirimsurat')
                                            @include('pelanggaran.modal.panggilulang')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $s->nis }}</td>
                                                <td>{{ $s->nama_siswa }}</td>
                                                <td>
                                                    @if ($s->pelanggaran->count('pelanggaran.id') == 1)
                                                        <span class="badge light badge-primary">{{ $s->pelanggaran->count('pelanggaran.id') }}</span>
                                                    @elseif ($s->pelanggaran->count('pelanggaran.id') == 2)
                                                        <span class="badge light badge-warning">{{ $s->pelanggaran->count('pelanggaran.id') }}</span>
                                                    @else
                                                        <span class="badge light badge-danger">{{ $s->pelanggaran->count('pelanggaran.id') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($s->pelanggaran as $key => $value)
                                                        {{ $value->jenis }},
                                                    @endforeach

                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <div class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                                            <a class="dropdown-item" href="{{ route('pelanggaran.show', $s->id) }}">Lihat</a>

                                                            @if ($s->pelanggaran->count('pelanggaran.id') > 0)
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#kirimSurat{{ $s->id }}">Kirim Surat</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.layout.footer')
