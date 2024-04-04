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
        <form action="{{ route('customer.update', ['id' => $customer->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input value="{{ $customer->nama }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Nama Lengkap" id="nama" name="nama">
                <input value="{{ $customer->id }}" required type="hidden" class="form-control" autocomplete="off"
                    placeholder="Nama Lengkap" id="id" name="id">
            </div>
            <label>Tanggal Lahir</label>
            <div class="input-group mb-3">
                <input value="{{ $customer->tanggal_lahir }}" required type="date" class="form-control"
                    autocomplete="off"placeholder="Tanggal Lahir" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $customer->alamat }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Alamat" id="alamat" name="alamat">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $customer->no_telp }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Nomor Telepon" id="no_telp" name="no_telp">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $customer->nik }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Masukan NIK" id="nik" name="nik">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $customer->sim }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Masukan No SIM" id="sim" name="sim">
            </div>
            <label>Unggah Foto Setengah Badan</label>
            <br />

            @if ($customer->foto_profil)
                <img src="{{ asset('storage/customer/fotoprofil/' . $customer->foto_profil) }}" alt="Foto SIM"
                    style="max-width: 200px;">
            @endif
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="foto_profil" name="foto_profil">
            </div>
            <label>Unggah Foto SIM</label>
            <br />
            @if ($customer->foto_ktp)
                <img src="{{ asset('storage/customer/sim/' . $customer->foto_sim) }}" alt="Foto SIM"
                    style="max-width: 200px;">
            @endif
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="foto_sim" name="foto_sim">
            </div>
            <label>Unggah Foto KTP</label>
            <br />

            @if ($customer->foto_ktp)
                <img src="{{ asset('storage/customer/ktp/' . $customer->foto_ktp) }}" alt="Foto KTP"
                    style="max-width: 200px;">
            @endif
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
            </div>
    </div>
    <div class="container">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
