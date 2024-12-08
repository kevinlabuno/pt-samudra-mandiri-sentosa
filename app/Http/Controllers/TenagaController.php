<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenaga;

class TenagaController extends Controller
{
    // Tampilkan halaman utama
    public function index()
    {
        $tenagas = Tenaga::all(); // Ambil semua data Tenaga
        return view('settings.tenaga', compact('tenagas'));
    }

    // Simpan data baru
public function store(Request $request)
{
    $request->validate([
        'skinning' => 'required|string|max:255',
        'kerja' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
    ], [
        'skinning.required' => 'Field "Skinning" harus diisi!',
        'skinning.string' => 'Field "Skinning" harus berupa teks!',
        'skinning.max' => 'Field "Skinning" tidak boleh lebih dari 255 karakter!',
        'kerja.required' => 'Field "Kerja" harus diisi!',
        'kerja.string' => 'Field "Kerja" harus berupa teks!',
        'kerja.max' => 'Field "Kerja" tidak boleh lebih dari 255 karakter!',
        'jumlah.required' => 'Field "Jumlah" harus diisi!',
        'jumlah.integer' => 'Field "Jumlah" harus berupa angka bulat!',
        'jumlah.min' => 'Field "Jumlah" tidak boleh kurang dari 1!',
    ]);

    Tenaga::create($request->all()); // Simpan data

    return redirect()->back()->with('success', 'Data Tenaga berhasil ditambahkan!');
}


    // Hapus data
    public function destroy($id)
    {
        $tenaga = Tenaga::findOrFail($id);
        $tenaga->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data Tenaga berhasil dihapus!');
    }

    // Update data
public function update(Request $request, $id)
{
    // Menemukan data berdasarkan ID
    $tenaga = Tenaga::findOrFail($id);

    // Validasi input
    $request->validate([
        'skinning' => 'required|string|max:255',
        'kerja' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:1',
    ], [
        'skinning.required' => 'Field "Skinning" harus diisi!',
        'skinning.string' => 'Field "Skinning" harus berupa teks!',
        'skinning.max' => 'Field "Skinning" tidak boleh lebih dari 255 karakter!',
        'kerja.required' => 'Field "Kerja" harus diisi!',
        'kerja.string' => 'Field "Kerja" harus berupa teks!',
        'kerja.max' => 'Field "Kerja" tidak boleh lebih dari 255 karakter!',
        'jumlah.required' => 'Field "Jumlah" harus diisi!',
        'jumlah.integer' => 'Field "Jumlah" harus berupa angka bulat!',
        'jumlah.min' => 'Field "Jumlah" tidak boleh kurang dari 1!',
    ]);

    // Update data
    $tenaga->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Tenaga berhasil diubah!');
}

}
