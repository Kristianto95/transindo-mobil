<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Data Diri</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="Nama Lengkap" id="nama" name="nama">
                    </div>
                    <label>Tanggal Lahir</label>
                    <div class="input-group mb-3">
                        <input required type="date" class="form-control"
                            autocomplete="off"placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Alamat"
                            id="alamat" name="alamat">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="Nomor Telepon" id="no_telp" name="no_telp">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Masukan NIK"
                            id="nik" name="nik">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="Masukan No SIM" id="sim" name="sim">
                    </div>
                    <label>Unggah Foto Setengah Badan</label>
                    <div class="input-group mb-3">
                        <input required type="file" class="form-control" id="foto_profil" name="foto_profil">
                    </div>
                    <label>Unggah Foto SIM</label>
                    <div class="input-group mb-3">
                        <input required type="file" class="form-control" id="foto_sim" name="foto_sim">
                    </div>
                    <label>Unggah Foto KTP</label>
                    <div class="input-group mb-3">
                        <input required type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
