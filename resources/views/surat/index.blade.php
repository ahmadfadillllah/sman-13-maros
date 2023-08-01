@include('dashboard.layout.head')
@include('dashboard.layout.chatbox')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="heading mb-0">Daftar User</h4>
                <div class="d-flex align-items-center">
                    <ul class="nav nav-pills mix-chart-tab user-m-tabe" id="pills-tab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <button class="nav-link" data-series="colm" id="pills-colm-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-colm" type="button" role="tab" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24  24" version="1.1" class="svg-main-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z"
                                            fill="#000000" />
                                        <path
                                            d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </button>
                        </li>
                        <a href="#" class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#insertSurat">+ Tambah Nomor Surat</a>
                        @include('surat.modal.insert')
                    </ul>
                </div>
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
                                                <th>Nomor Surat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($surat as $s)
                                            @include('surat.modal.edit')
                                            @include('surat.modal.destroy')
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $s->nomor }}</td>
                                                <td>{{ $s->status == true ? 'Sudah digunakan' : 'Belum Digunakan' }}</td>
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
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSurat{{ $s->id }}">Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#destroySurat{{ $s->id }}">Hapus</a>
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
