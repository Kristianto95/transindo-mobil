<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    //
    public function index(Request $request)
    {
        $customer = DB::table('customers')->when($request->term != "", function ($q) use ($request) {
            $q->where('nama', $request->term);
        })->get();
        return view('backend.customer.index', ['customer' => $customer]);
    }
    public function store(Request $request)
    {
        if ($request->hasFile('foto_profil') && $request->hasFile('foto_profil') && $request->hasFile('foto_profil')) {
            $fotoprofil = $request->file('foto_profil');
            $fotoprofilRename = $request->nama . '.' . $fotoprofil->extension();
            $fotoprofil->storeAs('public/customer/fotoprofil/', $fotoprofilRename);

            $ktp = $request->file('foto_ktp');
            $ktpRename = $request->nama . '.' .  $ktp->extension();
            $ktp->storeAs('public/customer/ktp/', $ktpRename);

            $sim = $request->file('foto_sim');
            $simRename = $request->nama . '.' .  $sim->extension();
            $sim->storeAs('public/customer/sim/', $simRename);
        }

        DB::table('customers')->insert([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'nik' => $request->nik,
            'sim' => $request->sim,
            'foto_profil' => $fotoprofilRename,
            'foto_ktp' =>  $ktpRename,
            'foto_sim' =>   $simRename
        ]);
        return redirect('customer');
    }
    public function edit($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();
        return view('backend.customer.edit', ['customer' => $customer]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $customer = DB::table('customers')->where('id', $request->id)->first();

        if ($request->hasFile('foto_profil')) {
            Storage::delete('public/customer/fotoprofil/' . $customer->foto_profil);
            $fotoprofil = $request->file('foto_profil');
            $fotoprofilRename = $request->nama . '.' . $fotoprofil->extension();
            $fotoprofil->storeAs('public/customer/fotoprofil/', $fotoprofilRename);
        } else {
            $fotoprofilRename = $customer->foto_profil;
        }

        if ($request->hasFile('foto_ktp')) {
            Storage::delete('public/customer/ktp/' . $customer->foto_ktp);
            $ktp = $request->file('foto_ktp');
            $ktpRename = $request->nama . '.' .  $ktp->extension();
            $ktp->storeAs('public/customer/ktp/', $ktpRename);
        } else {
            $ktpRename = $customer->foto_ktp;
        }

        if ($request->hasFile('sim')) {
            Storage::delete('public/customer/sim/' . $customer->foto_sim);
            $sim = $request->file('foto_sim');
            $simRename = $request->nama . '.' .  $sim->extension();
            $sim->storeAs('public/customer/sim/', $simRename);
        } else {
            $simRename = $customer->foto_sim;
        }
        DB::table('customers')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'nik' => $request->nik,
            'sim' => $request->sim,
            'foto_profil' => $fotoprofilRename,
            'foto_ktp' =>  $ktpRename,
            'foto_sim' =>   $simRename
        ]);


        return redirect('customer');
    }

    public function delete(Request $request)
    {
        $customer = DB::table('customers')->where('id', $request->id)->first();
        Storage::delete('public/customer/fotoprofil/' . $customer->foto_profil);
        Storage::delete('public/customer/sim/' . $customer->foto_sim);
        Storage::delete('public/customer/ktp/' . $customer->foto_ktp);


        $customer = DB::table('customers')->where('id', $request->id)->delete();

        return redirect('customer');
    }
}
