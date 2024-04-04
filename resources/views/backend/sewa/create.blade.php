<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Mobil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sewa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_customer">Customer</label>
                        <select class="form-control mb-3" id="id_customer" name="id_customer">
                            <option selected disabled>--Pilih Customer--</option>
                            @foreach ($customer as $key => $cust)
                                <option value="{{ $cust->id }}">{{ $cust->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_mobil">Mobil</label>
                        <select class="form-control mb-3" id="id_mobil" name="id_mobil">
                            <option selected disabled>--Pilih Mobil--</option>
                            @foreach ($mobil as $key => $mob)
                                <option value="{{ $mob->id }}">{{ $mob->kode_mobil }} -{{ $mob->merk }} -
                                    {{ $mob->model }} - {{ $mob->plat_mobil }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="harga_sewa_perhari">Harga Sewa Perhari</label>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" disabled readonly autocomplete="off"
                            id="harga_sewa_perhari" name="harga_sewa_perhari">
                        <input type="hidden" name="is_status" id="is_status">
                        <input type="hidden" id="sewa_tanggal_kembali">
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
                        <input required type="text" class="form-control" autocomplete="off" placeholder="total_biaya"
                            id="total_biaya" name="total_biaya" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Deskripsi"
                            id="deskripsi" name="deskripsi">
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
