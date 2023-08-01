<div class="modal fade" id="panggilUlang{{ $s->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon
                    src="https://cdn.lordicon.com/tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon>
                <div class="mt-4 pt-4">
                    <h4>Apa anda yakin kirim ulang pesan ke wali murid?</h4>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('pelanggaran.send_again', $s->id) }}" type="button"  class="btn btn-warning">Ya, Kirim Ulang</a>
                </div>
            </div>
        </div>
    </div>
</div>
