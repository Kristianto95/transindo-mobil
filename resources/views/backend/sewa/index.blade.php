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
                <form action="{{ route('sewa') }}">
                    <input type="text" name="term" id="term" placeholder="Cari Kode Transaksi"
                        class="form-control float-end">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>
                </form>
            </div>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">kode Transaksi</th>
                    <th scope="col">Penyewa</th>
                    <th scope="col">Mobil</th>
                    <th scope="col">Tanggal Sewa</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Lama Sewa</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sewa as $key => $sewas)
                    <tr>
                        <td>1</td>
                        <td>{{ $sewas->kode_transaksi }}</td>
                        <td>{{ $sewas->nama }}</td>
                        <td>{{ $sewas->kode_mobil }} - {{ $sewas->merk }} - {{ $sewas->plat_mobil }}</td>
                        <td>{{ $sewas->tanggal_sewa }}</td>
                        <td>{{ $sewas->tanggal_kembali }}</td>
                        <td>{{ $sewas->lama_sewa }} hari</td>
                        <td>{{ $sewas->total_biaya }}</td>
                        <td>{{ $sewas->deskripsi }}</td>
                        <td><a class="btn btn-success" href="{{ route('sewa.edit', ['id' => $sewas->id_sewa]) }}">Edit</a>
                        </td>
                        <td><a href="{{ route('sewa.delete', ['id' => $sewas->id_sewa]) }}" class="btn btn-danger"
                                href="">Hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('backend.sewa.create')
@endsection
@push('script')
    @vite('resources/js/backend/sewa.js')
@endpush
