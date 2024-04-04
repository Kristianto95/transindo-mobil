<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class MobilController extends Controller
{
    public function index(Request $request)
    {
        $mobil = DB::table('mobils')->when($request->term != "", function ($q) use ($request) {
            $q->where('merk', $request->term);
        })->get();
        return view('backend.mobil.index', ['mobil' => $mobil]);
    }
    public function store(Request $request)
    {
        if ($request->hasFile('foto_mobil')) {
            $fotomobil = $request->file('foto_mobil');
            $fotomobilRename = $request->kode_mobil . '.' . $fotomobil->extension();
            $fotomobil->storeAs('public/mobil/', $fotomobilRename);
        }

        DB::table('mobils')->insert([
            'kode_mobil' => $request->kode_mobil,
            'merk' => $request->merk,
            'model' => $request->model,
            'plat_mobil' => $request->plat_mobil,
            'sewa_per_hari' => $request->sewa_per_hari,
            'foto_mobil' => $fotomobilRename,
            'status' => 1,
        ]);
        return redirect('mobil');
    }
    public function edit($id)
    {
        $mobil = DB::table('mobils')->where('id', $id)->first();
        return view('backend.mobil.edit', ['mobil' => $mobil]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $mobil = DB::table('mobils')->where('id', $request->id)->first();

        if ($request->hasFile('foto_mobil')) {
            Storage::delete('public/mobil/' . $mobil->foto_mobil);
            $fotomobil = $request->file('foto_mobil');
            $fotomobilRename = $request->kode_mobil . '.' . $fotomobil->extension();
            $fotomobil->storeAs('public/mobil/', $fotomobilRename);
        } else {
            $fotomobilRename = $mobil->foto_mobil;
        }
        DB::table('mobils')->where('id', $request->id)->update([
            'kode_mobil' => $request->kode_mobil,
            'merk' => $request->merk,
            'model' => $request->model,
            'plat_mobil' => $request->plat_mobil,
            'sewa_per_hari' => $request->sewa_per_hari,
            'foto_mobil' => $fotomobilRename,
            'status' => 0,
        ]);

        return redirect('mobil');
    }

    public function delete(Request $request)
    {
        $mobil = DB::table('mobils')->where('id', $request->id)->first();
        Storage::delete('public/mobil/' . $mobil->foto_mobil);

        $mobil = DB::table('mobils')->where('id', $request->id)->delete();
        return redirect('mobil');
    }

    public function getHarga($id)
    {

        $hargaMobil = DB::table('mobils')

            ->leftJoin('sewas', 'mobils.id', '=', 'sewas.id_mobil')
            ->where('mobils.id', $id)
            ->select('sewa_per_hari', 'status', 'tanggal_sewa', 'tanggal_kembali', 'is_status')->orderBy('tanggal_kembali', 'desc')->first();
        // dd($hargaMobil);

        return $hargaMobil;
    }
}
