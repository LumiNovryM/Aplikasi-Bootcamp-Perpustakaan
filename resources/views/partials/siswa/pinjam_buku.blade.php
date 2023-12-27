<div class="modal fade" id="editModal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Detail Pinjam Buku</h5>
            </div>
            <form action="{{ route('store_trx', ['id' => $data->id]) }}" method="POST">
                @csrf
                @method('POST')
                
                <input type="hidden" id="editBookId" value="">
                <div class="modal-body container-fluid">
                    <div class="mb-3">
                        <input hidden autocomplete="off" type="text" class="form-control" id="buku_id" name="buku_id" value="{{ $data->id }}">

                        <input hidden autocomplete="off" type="text" class="form-control" id="siswa_id" name="siswa_id" value="{{ $siswa->id }}">

                        <label for="nama" class="form-label">Nama Siswa</label>
                        <input disabled type="text" class="form-control" id="kelas" name="nama" value="{{ $siswa->nama }}">

                        <label for="kelas" class="form-label">Kelas</label>
                        <input disabled autocomplete="off" type="email" class="form-control" id="kelas" name="kelas" value="{{ $siswa->kelas }}">

                        <label for="buku" class="form-label">Nama Buku</label>
                        <input disabled autocomplete="off" type="email" class="form-control" id="buku" name="buku" value="{{ $data->judul }}">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pinjam buku</button>
                </div>
            </form>
        </div>
    </div>
</div>
