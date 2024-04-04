@extends('layout.app')
@section('content')
    <div class="container mt-5 p-5">
        <div class="row">

            <div class="col-4 ">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
            </div>
            <div class="col-8 ">
                <form action="{{ route('mobil') }}">
                    <div class="form-group">
                        <input type="text" name="term" id="term" placeholder="Cari Merk"
                            class="form-control float-end">
                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode </th>
                    <th scope="col">Image </th>
                    <th scope="col">Merk</th>
                    <th scope="col">Model</th>
                    <th scope="col">Plat Mobil</th>
                    <th scope="col">Sewa per Hari</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mobil as $key => $mob)
                    <tr>
                        <td>1</td>
                        <td>{{ $mob->kode_mobil }}</td>
                        <td><a href="{{ asset('storage/mobil/' . $mob->foto_mobil) }}" data-lightbox="photos">
                                <img src="{{ asset('storage/mobil/' . $mob->foto_mobil) }}" class="img-fluid"> </td></a>
                        <td>{{ $mob->merk }}</td>
                        <td>{{ $mob->model }}</td>
                        <td>{{ $mob->plat_mobil }}</td>
                        <td>Rp. {{ rupiah($mob->sewa_per_hari) }}</td>
                        @if ($mob->status == '1')
                            <td>Tersedia</td>
                        @else
                            <td>Tidak Tersedia</td>
                        @endif
                        <td><a class="btn btn-success" href="{{ route('mobil.edit', ['id' => $mob->id]) }}">Edit</a>
                        </td>
                        <td><a href="{{ route('mobil.delete', ['id' => $mob->id]) }}" class="btn btn-danger"
                                href="">Hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('backend.mobil.create')
@endsection
