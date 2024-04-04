<div class="container-fluid">

    <div class="stepwizard col-md-offset-3">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
        </div>
    </div>

    <form role="form" action="{{ route('welcome.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row setup-content" id="step-1">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3> Step 1</h3>
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
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-2">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3> Step 2</h3>
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
                    <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="step-3">
            <div class="col-xs-6 col-md-offset-3">
                <div class="col-md-12">
                    <h3> Step 3</h3>
                    <label for="mobil">Merk Mobil</label>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" id="mobil"
                            name="mobil" value="{{ $mob->merk }}" readonly disabled>
                        <input required type="hidden" class="form-control" autocomplete="off" id="id_mobil"
                            name="id_mobil" value="{{ $mob->id }}" readonly>
                    </div>
                    <label for="model">Model Mobil</label>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" id="model"
                            name="model" value="{{ $mob->model }}" readonly disabled>
                        <input type="hidden" name="is_status" id="is_status">
                        <input type="hidden" id="sewa_tanggal_kembali">
                    </div>
                    <label for="sewa_per_hari">Sewa Per hari</label>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" id="sewa_per_hari"
                            name="sewa_per_hari" value="{{ rupiah($mob->sewa_per_hari) }}" readonly disabled>
                    </div>
                    <label for="tanggal_sewa">Tanggal Sewa</label>
                    <div class="input-group mb-3">
                        <input required type="date" class="form-control" autocomplete="off" id="tanggal_sewa"
                            name="tanggal_sewa">
                    </div>
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <div class="input-group mb-3">
                        <input required type="date" class="form-control" autocomplete="off" id="tanggal_kembali"
                            name="tanggal_kembali">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <input required type="text" class="form-control" autocomplete="off"
                                    placeholder="Lama Sewa" id="lama_sewa" name="lama_sewa" readonly>
                            </div>
                        </div>
                        <div class="col-5">Hari</div>
                    </div>

                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="total_biaya" id="total_biaya" name="total_biaya" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off"
                            placeholder="Deskripsi" id="deskripsi" name="deskripsi">
                    </div>
                    <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Previous</button>
                    <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>
