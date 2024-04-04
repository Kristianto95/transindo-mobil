<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Mobil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Kode Mobil"
                            id="kode_mobil" name="kode_mobil">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Merk"
                            id="merk" name="merk">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Model"
                            id="model" name="model">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="Nomor Plat Mobil" id="plat_mobil" name="plat_mobil">
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="Masukan Harga Sewa Per hari" id="sewa_per_hari" name="sewa_per_hari">
                    </div>
                    <label>Unggah Foto</label>
                    <div class="input-group mb-3">
                        <input required type="file" class="form-control" id="foto_mobil" name="foto_mobil">
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
