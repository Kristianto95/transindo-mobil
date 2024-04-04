<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        $mobil = DB::table('mobils')->get();
        return view('frontend.index', ['mobil' => $mobil]);
    }

    public function store(Request $request)
    {
        $cekCus = DB::table('customers')->where('nik', $request->nik)->first();
        if ($cekCus) {
            $cariCUst = $cekCus;
        } else {
            // dd($request->all());
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

            $simpanCust = DB::table('customers')->insert([
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

            $cariCUst = DB::table('customers')->where('nik', $request->nik)->first();
        }


        if ($cariCUst) {

            $idCust = $cariCUst->id;
            $kode_transaksi = "BOOK" . strtoupper(uniqid());
            $total_biaya = str_replace('.', '', $request->total_biaya);
            $sewa = DB::table('sewas')->insert([
                'kode_transaksi' => $kode_transaksi,
                'id_customer' => $idCust,
                'id_mobil' => $request->id_mobil,
                'tanggal_sewa' => $request->tanggal_sewa,
                'tanggal_kembali' => $request->tanggal_kembali,
                'lama_sewa' => $request->lama_sewa,
                'total_biaya' => $total_biaya,
                'deskripsi' => $request->deskripsi,
            ]);
            if ($sewa) {
                DB::table('mobils')->where('id', $request->id_mobil)->update([
                    'status' => 0,
                ]);
            }

            return redirect()->route('success', ['kode_transaksi' => $kode_transaksi]);
        }
    }

    public function success($kode_transaksi)
    {


        $sewa = DB::table('sewas')
            ->join('customers', 'customers.id', '=', 'sewas.id_customer')
            ->join('mobils', 'mobils.id', '=', 'sewas.id_mobil')
            ->select('sewas.kode_transaksi', 'sewas.id as id_sewa', 'sewas.tanggal_sewa', 'sewas.tanggal_kembali', 'sewas.lama_sewa', 'sewas.total_biaya', 'sewas.deskripsi', 'mobils.*', 'customers.*')
            ->where('sewas.kode_transaksi', '=', $kode_transaksi)
            ->first();
        return view('frontend.success', ['sewa' => $sewa]);
    }
    public function payment()
    {
        return view('frontend.payment');
    }

    public function cekstatus(Request $request)
    {
        $sewa = DB::table('sewas')
            ->join('customers', 'customers.id', '=', 'sewas.id_customer')
            ->join('mobils', 'mobils.id', '=', 'sewas.id_mobil')
            ->select('sewas.kode_transaksi', 'sewas.id as id_sewa', 'sewas.tanggal_sewa', 'sewas.tanggal_kembali', 'sewas.lama_sewa', 'sewas.total_biaya', 'sewas.deskripsi', 'mobils.*', 'customers.*')
            ->where('sewas.kode_transaksi', '=', $request->kode_transaksi)
            ->first();
        return view('frontend.cekstatus', ['sewa' => $sewa]);
    }
}
