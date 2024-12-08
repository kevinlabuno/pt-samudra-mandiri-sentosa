<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kaleng;

class KalengController extends Controller
{
    // Tampilkan halaman utama
    public function index()
    {
        $kalengs = Kaleng::all(); // Ambil semua data Kaleng
        return view('settings.kaleng', compact('kalengs'));
    }

    // Simpan data baru
public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|unique:kalengs,kode',
        'nama' => 'required|string|max:255',
        'ukuran' => 'required|string|max:255',
    ], [
        'kode.required' => 'Kode kaleng harus diisi!',
        'kode.unique' => 'Kode kaleng sudah ada, gunakan kode lain!',
        'nama.required' => 'Nama kaleng harus diisi!',
        'nama.string' => 'Nama kaleng harus berupa teks!',
        'nama.max' => 'Nama kaleng tidak boleh lebih dari 255 karakter!',
        'ukuran.required' => 'Ukuran kaleng harus diisi!',
        'ukuran.string' => 'Ukuran kaleng harus berupa teks!',
        'ukuran.max' => 'Ukuran kaleng tidak boleh lebih dari 255 karakter!',
    ]);

    Kaleng::create($request->all()); // Simpan data

    return redirect()->back()->with('success', 'Data Kaleng berhasil ditambahkan!');
}


    // Hapus data
    public function destroy($id)
    {
        $kaleng = Kaleng::findOrFail($id);
        $kaleng->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data Kaleng berhasil dihapus!');
    }

    // Update data
public function update(Request $request, $id)
{
    // Menemukan data Kaleng berdasarkan ID
    $kaleng = Kaleng::findOrFail($id);

    // Validasi input
    $request->validate([
        'kode' => 'required|unique:kalengs,kode,' . $kaleng->id, // Pastikan kode unik kecuali untuk ID yang sedang diupdate
        'nama' => 'required|string|max:255',
        'ukuran' => 'required|string|max:255',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'kode.unique' => 'Kode sudah digunakan, pilih kode yang lain!',
        'nama.required' => 'Nama harus diisi!',
        'ukuran.required' => 'Ukuran harus diisi!',
    ]);

    // Mengupdate data Kaleng
    $kaleng->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Kaleng berhasil diubah!');
}

}
