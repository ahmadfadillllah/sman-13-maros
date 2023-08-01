@include('dashboard.layout.head')
@include('dashboard.layout.chatbox')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="content-body">
    <!-- container starts -->
    <div class="container-fluid">
        <!-- row -->

        <div class="demo-view">
            <div class="container-fluid pt-0 ps-0 pe-lg-12 pe-0">
                <div class="row">

                    <!-- Column starts -->
                    <div class="col-xl-12">
                        <div class="card dz-card" id="accordion-three">
                            <div class="card-header flex-wrap d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title">Daftar Kelas</h4>
                                    </p>
                                </div>
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#insertKelas">Tambah Kelas</button>
                                <!-- Modal -->
                                @include('kelas.modal.insert')
                            </div>

                            <!-- /tab-content -->
                            <div class="tab-content" id="myTabContent-2">
                                <div class="tab-pane fade show active" id="withoutSpace" role="tabpanel"
                                    aria-labelledby="home-tab-2">
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table id="example3" class="display table" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kelas</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kelas as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nama_kelas }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="#"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editKelas{{ $item->id }}"><i
                                                                        class="fas fa-pencil-alt"></i></a>
                                                                <a href="#"
                                                                    class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#destroyKelas{{ $item->id }}"><i
                                                                        class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('kelas.modal.edit')
                                                    @include('kelas.modal.destroy')
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column ends -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('dashboard.layout.footer')
