@include('dashboard.layout.head')
@include('dashboard.layout.chatbox')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="clearfix">
                    <div class="card card-bx profile-card author-profile m-b30">
                        <div class="card-body">
                            <div class="p-5">
                                <div class="author-profile">
                                    <div class="author-media">
                                        <img src="{{ asset('yash/yashadmin.dexignzone.com/xhtml/profile') }}/{{ Auth::user()->avatar }}" alt="">
                                    </div>
                                    <div class="author-info">
                                        <h6 class="title">{{ Auth::user()->username }}</h6>
                                        <span style="font-size:8pt">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group mb-3">
                                <div class="form-control text-center bg-white">Avatar Sebelumnya</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card profile-card card-bx m-b30">
                    <div class="card-header">
                        <h6 class="title">Ganti Avatar</h6>
                    </div>
                    <form class="profile-form" action="{{ route('profile.change_avatar.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
								    <input class="form-control" type="file" id="formFile" name="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Avatar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.layout.footer')
