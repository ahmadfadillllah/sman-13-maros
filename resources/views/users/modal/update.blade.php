<div class="modal fade" id="editUser{{ $s->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <form action="{{ route('users.update', $s->id ) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control input-default" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control input-default" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control input-default" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" class="form-control input-default" name="password_confirmation" required>
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
