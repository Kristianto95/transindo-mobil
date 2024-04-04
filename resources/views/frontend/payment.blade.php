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
    <section class="container-fluid text-center text-white" id="home"
        style="background-image:url('{{ asset('img/cover.jpg') }}'); background-size:cover;height: 100vh; display: flex; justify-content: center; align-items: center;">

        <div class="container mt-5 justify-content-center p-5">
            <h1 class="mt-5 h1">CEK DETAIL SEWA</h1>
            <form class="d-flex col-lg-12 "action="{{ route('cekstatus') }}" method="post">>
                @csrf
                <div class="row col-lg-12">
                    <div class="form-floating mb-3 col-lg-10">
                        <input type="text" autocomplete="off" class="form-control" id="kode_transaksi"
                            name="kode_transaksi" placeholder="Jumlah Unit">
                        <label class="ms-2 text-dark" for="Kode Transaksi">Kode Transaksi</label>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-12 justify-content-end">
                        <button class="w-100 btn btn-lg btn-warning" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send-dash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                <path
                                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-5.5 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </section>

    @include('frontend.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
