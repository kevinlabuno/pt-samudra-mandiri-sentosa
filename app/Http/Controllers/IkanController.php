<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ikan;

class IkanController extends Controller
{
    // Tampilkan halaman utama
    public function index()
    {
        $ikans = Ikan::all(); // Ambil semua data Ikan
        return view('settings.ikan', compact('ikans'));
    }

    // Simpan data baru
public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|unique:ikans,kode',
        'nama' => 'required|string|max:255',
    ], [
        'kode.required' => 'Kode ikan harus diisi!',
        'kode.unique' => 'Kode ikan sudah ada, gunakan kode lain!',
        'nama.required' => 'Nama ikan harus diisi!',
        'nama.string' => 'Nama ikan harus berupa teks!',
        'nama.max' => 'Nama ikan tidak boleh lebih dari 255 karakter!',
    ]);

    Ikan::create($request->all()); // Simpan data

    return redirect()->back()->with('success', 'Data Ikan berhasil ditambahkan!');
}


    // Hapus data
    public function destroy($id)
    {
        $ikan = Ikan::findOrFail($id);
        $ikan->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data Ikan berhasil dihapus!');
    }

    // Update data
public function update(Request $request, $id)
{
    // Menemukan data Ikan berdasarkan ID
    $ikan = Ikan::findOrFail($id);

    // Validasi input
    $request->validate([
        'kode' => 'required|unique:ikans,kode,' . $id, // Pastikan kode unik kecuali untuk ID yang sedang diupdate
        'nama' => 'required|string|max:255',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'kode.unique' => 'Kode sudah digunakan, pilih kode yang lain!',
        'nama.required' => 'Nama harus diisi!',
        'nama.string' => 'Nama harus berupa string!',
        'nama.max' => 'Nama tidak boleh lebih dari 255 karakter!',
    ]);

    // Mengupdate data Ikan
    $ikan->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Ikan berhasil diubah!');
}

}
