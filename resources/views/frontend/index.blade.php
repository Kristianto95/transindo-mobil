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
            <h1 class="mt-5 h1">TRANSINDO AUTO</h1>
            <p class="lead">"SEWA MOBIL LEPAS TANGAN"</p>
        </div>

    </section>
    @include('frontend.about')
    @include('frontend.service')
    @include('frontend.unit.index')
    @include('frontend.contact')


    @include('frontend.footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/frontend.js') }}"></script>
</body>

</html>
