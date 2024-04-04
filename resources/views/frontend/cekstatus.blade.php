<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Cover Template · Bootstrap v5.2</title>

    <link href="{{ asset('css/front-end.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9">

</head>

<body class="">

    @include('frontend.navbar')
    <section id="success" class=" py-5 sevice-container bg-dark ">
        <div class="container p-5  mb-5">
            <div class="row container mb-5">
                <div class="container p-4 mb-5 text-center">
                    <h2 class="fw-bold judul-section text-white">DETAIL STATUS</h2>
                    <p class="text-white">Persewaan Mobil</p>

                    <h3 class="text-white">{{ $sewa->kode_transaksi }}</h3>
                </div>
            </div>
            <div class="container align-items-md-stretch mb-5">
                <table class="table table-responsive text-white border-0">
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>Kode Transaksi</td>
                        <td>{{ $sewa->kode_transaksi }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $sewa->nama }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ $sewa->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $sewa->alamat }}</td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>{{ $sewa->no_telp }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>{{ $sewa->nik }}</td>
                    </tr>
                    <tr>
                        <td>Sim</td>
                        <td>{{ $sewa->sim }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Sewa</td>
                        <td>{{ $sewa->tanggal_sewa }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td>{{ $sewa->tanggal_kembali }}</td>
                    </tr>
                    <tr>
                        <td>Lama Sewa</td>
                        <td>{{ $sewa->lama_sewa }}</td>
                    </tr>
                    <tr>
                        <td>Total Biaya</td>
                        <td>{{ $sewa->total_biaya }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>{{ $sewa->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Foto Profil</td>
                        <td><img class="img-fluid"
                                src="{{ asset('storage/customer/fotoprofil/' . $sewa->foto_profil) }}"
                                alt="Foto Profil" style="max-height: 100px;"></td>
                    </tr>
                    <tr>
                        <td>Foto KTP</td>
                        <td><img class="img-fluid" src="{{ asset('storage/customer/ktp/' . $sewa->foto_ktp) }}"
                                alt="Foto KTP" style="max-height: 100px;"></td>
                    </tr>
                    <tr>
                        <td>Foto SIM</td>
                        <td><img class="img-fluid" src="{{ asset('storage/customer/sim/' . $sewa->foto_sim) }}"
                                alt="Foto SIM" style="max-height: 100px;"></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    @include('frontend.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/frontend.js') }}"></script>
</body>

</html>
