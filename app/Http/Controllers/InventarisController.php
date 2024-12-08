<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Ikan;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        $ikans = Ikan::all();
        return view('inventaris', compact('inventaris', 'ikans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_ikan' => 'required|exists:ikans,kode',
            'ukuran_ikan' => 'required',
            'net_weight' => 'required|numeric',
            'drain_weight' => 'required|numeric',
            'flakes' => 'required|numeric',
            'recovery' => 'required|numeric',
            'keadaan_ikan' => 'required|in:Fresh,Not Fresh',
            'jumlah' => 'required|numeric',
        ]);

        $ikan = Ikan::where('kode', $request->kode_ikan)->first();
        Inventaris::create([
            'kode_ikan' => $ikan->kode,
            'nama_ikan' => $ikan->nama,
            'ukuran_ikan' => $request->ukuran_ikan,
            'net_weight' => $request->net_weight,
            'drain_weight' => $request->drain_weight,
            'flakes' => $request->flakes,
            'recovery' => $request->recovery,
            'keadaan_ikan' => $request->keadaan_ikan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->back()->with('success', 'Data Inventaris berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_ikan' => 'required|exists:ikans,kode',
            'ukuran_ikan' => 'required',
            'net_weight' => 'required|numeric',
            'drain_weight' => 'required|numeric',
            'flakes' => 'required|numeric',
            'recovery' => 'required|numeric',
            'keadaan_ikan' => 'required|in:Fresh,Not Fresh',
            'jumlah' => 'required|numeric',
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $ikan = Ikan::where('kode', $request->kode_ikan)->first();

        $inventaris->update([
            'kode_ikan' => $ikan->kode,
            'nama_ikan' => $ikan->nama,
            'ukuran_ikan' => $request->ukuran_ikan,
            'net_weight' => $request->net_weight,
            'drain_weight' => $request->drain_weight,
            'flakes' => $request->flakes,
            'recovery' => $request->recovery,
            'keadaan_ikan' => $request->keadaan_ikan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->back()->with('success', 'Data Inventaris berhasil diupdate!');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
        return redirect()->back()->with('success', 'Data Inventaris berhasil dihapus!');
    }
}
