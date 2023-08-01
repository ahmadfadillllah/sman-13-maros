@include('dashboard.layout.head')
@include('dashboard.layout.chatbox')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">

            <div class="col-xl-12 col-lg-8">
                @include('notif.info')
                <div class="card profile-card card-bx m-b30">
                    <form class="profile-form" action="{{ route('profile.change_password.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Password Lama</label>
                                    <input type="password" class="form-control" name="password_lama">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="password_baru">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.layout.footer')
