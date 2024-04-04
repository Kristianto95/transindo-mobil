<section id="unit" class="container-fluid marketing  mb-5">
    <div class="col-lg-12 justify-content-center d-flex flex-column mx-auto p-3text-center ">

        <div class="container p-5 mb-3  mt-5  text-center">
            <h2 class="fw-bold judul-section text-white">UNIT KAMI</h2>
        </div>
        <div class="container mb-5 p-5">
            <div class="row">
                @foreach ($mobil as $key => $mob)
                    <div class="col-lg-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('storage/mobil/' . $mob->foto_mobil) }}" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $mob->merk }}</h5>
                                <p class="card-text">{{ $mob->model }}</p>
                                <p class="card-text">Rp. {{ rupiah($mob->sewa_per_hari) }} / Hari</p>
                                <button type="button" class="btn btn-primary btn-sewa" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop" data-merk="{{ $mob->merk }}"
                                    data-model="{{ $mob->model }}" data-model="{{ $mob->status }}"
                                    data-sewa="{{ rupiah($mob->sewa_per_hari) }}" data-id="{{ $mob->id }}">
                                    Sewa Sekarang
                                </button>
                            </div>
                        </div>
                        @include('frontend.unit.modal')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
