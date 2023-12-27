<div class="modal fade" id="editModal_{{ $data->siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Detail Transaksi Buku</h5>
            </div>
            <div class="modal-body container-fluid">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <p id="detailNama">{{ $data->siswa->nama }}</p>

                    <label for="kelas" class="form-label">Kelas</label>
                    <p id="detailKelas">{{ $data->siswa->kelas }}</p>

                    <label for="email" class="form-label">Email</label>
                    <p id="detailEmail">{{ $data->siswa->email }}</p>

                    <label for="email" class="form-label">Status</label>
                    <p id="detailEmail">{{ $data->siswa->role_status }}</p>

                    <label for="email" class="form-label">Judul Buku</label>
                    <p id="detailEmail">{{ $data->buku->judul }}</p>

                    <label for="email" class="form-label">Penerbit</label>
                    <p id="detailEmail">{{ $data->buku->penerbit }}</p>

                    <label for="email" class="form-label">Pengarang</label>
                    <p id="detailEmail">{{ $data->buku->pengarang }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
