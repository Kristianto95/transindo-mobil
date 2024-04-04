<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SewaController extends Controller
{
    public function index()
    {
        $sewa = DB::table('sewas')
            ->join('customers', 'customers.id', '=', 'sewas.id_customer')
            ->join('mobils', 'mobils.id', '=', 'sewas.id_mobil')
            ->select('sewas.kode_transaksi', 'sewas.id as id_sewa', 'sewas.tanggal_sewa', 'sewas.tanggal_kembali', 'sewas.lama_sewa', 'sewas.total_biaya', 'sewas.deskripsi', 'mobils.*', 'customers.*')
            ->get();
        $customer = DB::table('customers')->get();
        $mobil = DB::table('mobils')->get();
        return view('backend.sewa.index', ['sewa' => $sewa, 'mobil' => $mobil, 'customer' => $customer]);
    }
    public function store(Request $request)
    {
        $kode_transaksi = "BOOK" . strtoupper(uniqid());
        $total_biaya = str_replace('.', '', $request->total_biaya);
        $sewa = DB::table('sewas')->insert([
            'kode_transaksi' => $kode_transaksi,
            'id_customer' => $request->id_customer,
            'id_mobil' => $request->id_mobil,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'lama_sewa' => $request->lama_sewa,
            'total_biaya' => $total_biaya,
            'deskripsi' => $request->deskripsi,
            'is_status' => 0,
        ]);
        if ($sewa) {
            DB::table('mobils')->where('id', $request->id_mobil)->update([
                'status' => 1,
            ]);
        }
        return redirect('sewa');
    }
    public function edit($id)
    {
        $customer = DB::table('customers')->get();
        $mobil = DB::table('mobils')->get();
        $sewa = DB::table('sewas')
            ->join('customers', 'customers.id', '=', 'sewas.id_customer')
            ->join('mobils', 'mobils.id', '=', 'sewas.id_mobil')
            ->select('sewas.kode_transaksi', 'sewas.id_customer',  'sewas.id_mobil', 'sewas.id as id_sewa', 'sewas.tanggal_sewa', 'sewas.tanggal_kembali', 'sewas.lama_sewa', 'sewas.total_biaya', 'sewas.deskripsi', 'mobils.*', 'customers.*')
            ->where('sewas.id', '=', $id)->first();
        return view('backend.sewa.edit', ['sewa' => $sewa, 'mobil' => $mobil, 'customer' => $customer]);
    }

    public function update(Request $request)
    {
        if ($request->has('is_status')) {
            $is_status = '0';
        }
        // dd($request->all());
        $sewa = DB::table('sewas')->where('id', $request->id)->update([

            'id_customer' => $request->id_customer,
            'id_mobil' => $request->id_mobil,
            'is_status' => $is_status,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'lama_sewa' => $request->lama_sewa,
            'total_biaya' => $request->total_biaya,
            'deskripsi' => $request->deskripsi,
        ]);

        // dd($sewa);
        if ($sewa) {
            DB::table('mobils')->where('id', $request->id_mobil)->update([
                'status' => 1,
            ]);
        }
        return redirect('sewa');
    }

    public function delete(Request $request)
    {
        $sewa = DB::table('sewas')->where('id', $request->id)->delete();
        return redirect('sewa');
    }
}
