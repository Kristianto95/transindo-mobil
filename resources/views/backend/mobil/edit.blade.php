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
        <form action="{{ route('mobil.update', ['id' => $mobil->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <input value="{{ $mobil->kode_mobil }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="kode mobil" id="kode_mobil" name="kode_mobil">
                <input value="{{ $mobil->id }}" required type="hidden" class="form-control" autocomplete="off"
                    placeholder="Nama Lengkap" id="id" name="id">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $mobil->merk }}" required type="text" class="form-control"
                    autocomplete="off"placeholder="Merk" id="merk" name="merk">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $mobil->model }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Model" id="model" name="model">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $mobil->plat_mobil }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Nomor Plat Mobil" id="plat_mobil" name="plat_mobil">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $mobil->sewa_per_hari }}" required type="text" class="form-control"
                    autocomplete="off" placeholder="Masukan Harga Sewa" id="sewa_per_hari" name="sewa_per_hari">
            </div>
            <div class="input-group mb-3">
                <input value="{{ $mobil->status }}" required type="text" class="form-control" autocomplete="off"
                    placeholder="Masukan No status" id="status" name="status">
            </div>
            <label>Unggah Foto Mobil</label>
            <br />

            @if ($mobil->foto_mobil)
                <img src="{{ asset('storage/mobil/' . $mobil->foto_mobil) }}" alt="Foto SIM" style="max-width: 200px;">
            @endif
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="foto_mobil" name="foto_mobil">
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
