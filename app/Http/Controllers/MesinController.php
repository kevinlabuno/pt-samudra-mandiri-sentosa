<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesin;

class MesinController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        $mesins = Mesin::all(); // Mengambil semua data Mesin
        return view('settings.mesin', compact('mesins'));
    }

    // Menyimpan data baru
public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|string|max:255|unique:mesins,kode',
        'kapasitas' => 'required|numeric|min:0',
        'efesiensi' => 'required|numeric|min:0|max:100',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'kode.unique' => 'Kode sudah ada, gunakan kode lain!',
        'kapasitas.required' => 'Kapasitas harus diisi!',
        'kapasitas.numeric' => 'Kapasitas harus berupa angka!',
        'efesiensi.required' => 'Efesiensi harus diisi!',
        'efesiensi.numeric' => 'Efesiensi harus berupa angka!',
        'efesiensi.max' => 'Efesiensi tidak boleh lebih dari 100!',
    ]);

    Mesin::create($request->all());

    return redirect()->back()->with('success', 'Data Mesin berhasil ditambahkan!');
}


    // Menghapus data
    public function destroy($id)
    {
        $mesin = Mesin::findOrFail($id);
        $mesin->delete(); // Menghapus data

        return redirect()->back()->with('success', 'Data Mesin berhasil dihapus!');
    }

    // Mengupdate data
public function update(Request $request, $id)
{
    // Menemukan data berdasarkan ID
    $mesin = Mesin::findOrFail($id);

    // Validasi input
    $request->validate([
        'kode' => 'required|string|max:255|unique:mesins,kode,' . $id,
        'kapasitas' => 'required|numeric|min:0',
        'efesiensi' => 'required|numeric|min:0|max:100',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'kode.unique' => 'Kode mesin sudah ada, silakan gunakan kode lain!',
        'kapasitas.required' => 'Kapasitas harus diisi!',
        'kapasitas.numeric' => 'Kapasitas harus berupa angka!',
        'kapasitas.min' => 'Kapasitas tidak boleh kurang dari 0!',
        'efesiensi.required' => 'Efisiensi harus diisi!',
        'efesiensi.numeric' => 'Efisiensi harus berupa angka!',
        'efesiensi.min' => 'Efisiensi tidak boleh kurang dari 0!',
        'efesiensi.max' => 'Efisiensi tidak boleh lebih dari 100!',
    ]);

    // Update data
    $mesin->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Mesin berhasil diubah!');
}

}
