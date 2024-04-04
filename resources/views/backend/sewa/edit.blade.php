<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('sewa.update', ['id' => $sewa->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id_customer">Customer</label>
                <select class="form-control mb-3" id="id_customer" name="id_customer">
                    <option selected disabled>--Pilih Customer--</option>
                    @foreach ($customer as $key => $cust)
                        <option value="{{ $cust->id }}" @if ($cust->id == $sewa->id_customer) selected @endif>
                            {{ $cust->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_mobil">Mobil</label>
                <select class="form-control mb-3" id="id_mobil" name="id_mobil">
                    <option selected disabled>--Pilih Mobil--</option>
                    @foreach ($mobil as $key => $mob)
                        <option value="{{ $mob->id }}" @if ($mob->id == $sewa->id_mobil) selected @endif>
                            {{ $mob->kode_mobil }} -{{ $mob->merk }} - {{ $mob->model }} - {{ $mob->plat_mobil }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="harga_sewa_perhari">Harga Sewa Perhari</label>
            <div class="input-group mb-3">
                <input required type="text" class="form-control" disabled readonly autocomplete="off"
                    id="harga_sewa_perhari" name="harga_sewa_perhari" value="{{ $sewa->sewa_per_hari }}">
                <input type="hidden" name="is_status" id="is_status">
                <input type="text" name="id" id="id" value="{{ $sewa->id_sewa }}">
                <input type="hidden" id="sewa_tanggal_kembali">
            </div>
            <label for="tanggal_sewa">Tanggal Sewa</label>
            <div class="input-group mb-3">
                <input required type="date" class="form-control" autocomplete="off" id="tanggal_sewa"
                    name="tanggal_sewa" value="{{ $sewa->tanggal_sewa }}">
            </div>
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <div class="input-group mb-3">
                <input required type="date" class="form-control" autocomplete="off" id="tanggal_kembali"
                    name="tanggal_kembali" value="{{ $sewa->tanggal_kembali }}">
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" autocomplete="off" placeholder="Lama Sewa"
                            id="lama_sewa" name="lama_sewa" value="{{ $sewa->lama_sewa }}" readonly>
                    </div>
                </div>
                <div class="col-5">Hari</div>
            </div>

            <div class="input-group mb-3">
                <input required type="text" class="form-control" autocomplete="off" placeholder="total_biaya"
                    id="total_biaya" name="total_biaya" value="{{ $sewa->total_biaya }}" readonly>
            </div>
            <div class="input-group mb-3">
                <input required type="text" class="form-control" autocomplete="off" placeholder="Deskripsi"
                    id="deskripsi" name="deskripsi" value="{{ $sewa->deskripsi }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/sewa.js') }}"></script>
</body>

</html>
