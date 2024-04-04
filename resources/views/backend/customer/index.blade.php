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
                <form action="{{ route('customer') }}">
                    <input type="text" name="term" id="term" placeholder="Cari Nama"
                        class="form-control float-end">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>
                </form>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">NIK</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col">Foto SIM</th>
                    <th scope="col">Foto KTP</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $key => $cust)
                    <tr>
                        <td>1</td>
                        <td>{{ $cust->nama }}</td>
                        <td>{{ $cust->alamat }}</td>
                        <td>{{ $cust->tanggal_lahir }}</td>
                        <td>{{ $cust->nik }}</td>
                        <td>{{ $cust->sim }}</td>
                        <td><a href="{{ asset('storage/customer/fotoprofil/' . $cust->foto_profil) }}"
                                data-lightbox="photos"><img
                                    src="{{ asset('storage/customer/fotoprofil/' . $cust->foto_profil) }}"
                                    class="img-fluid"></a>
                        </td>
                        <td><a href="{{ asset('storage/customer/sim/' . $cust->foto_sim) }}" data-lightbox="photos"><img
                                    src="{{ asset('storage/customer/sim/' . $cust->foto_sim) }}" class="img-fluid"></a>
                        </td>
                        <td><a href="{{ asset('storage/customer/ktp/' . $cust->foto_ktp) }}" data-lightbox="photos"><img
                                    src="{{ asset('storage/customer/ktp/' . $cust->foto_ktp) }}" class="img-fluid"></a>
                        </td>
                        <td><a class="btn btn-success" href="{{ route('customer.edit', ['id' => $cust->id]) }}">Edit</a>
                        </td>
                        <td><a href="{{ route('customer.delete', ['id' => $cust->id]) }}" class="btn btn-danger"
                                href="">Hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('backend.customer.create')
@endsection
