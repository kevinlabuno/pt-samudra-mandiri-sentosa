<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karton;
use App\Models\Kaleng;

class KartonController extends Controller
{
    // Tampilkan halaman utama
    public function index()
    {
        $kartons = Karton::all();
        $ukuranOptions = Kaleng::pluck('ukuran', 'id'); 
        return view('settings.karton', compact('kartons','ukuranOptions'));
    }

    // Simpan data baru
public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|unique:kartons,kode',
        'nama' => 'required|string|max:255',
        'ukuran' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:0',
    ], [
        'kode.required' => 'Kode karton harus diisi!',
        'kode.unique' => 'Kode karton sudah ada, gunakan kode lain!',
        'nama.required' => 'Nama karton harus diisi!',
        'nama.string' => 'Nama karton harus berupa teks!',
        'nama.max' => 'Nama karton tidak boleh lebih dari 255 karakter!',
        'ukuran.required' => 'Ukuran karton harus diisi!',
        'ukuran.string' => 'Ukuran karton harus berupa teks!',
        'ukuran.max' => 'Ukuran karton tidak boleh lebih dari 255 karakter!',
        'jumlah.required' => 'Jumlah karton harus diisi!',
        'jumlah.integer' => 'Jumlah karton harus berupa angka bulat!',
        'jumlah.min' => 'Jumlah karton tidak boleh kurang dari 0!',
    ]);

    Karton::create($request->all()); // Simpan data

    return redirect()->back()->with('success', 'Data Karton berhasil ditambahkan!');
}


    // Hapus data
    public function destroy($id)
    {
        $karton = Karton::findOrFail($id);
        $karton->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data Karton berhasil dihapus!');
    }

    // Update data
public function update(Request $request, $id)
{
    // Menemukan data Karton berdasarkan ID
    $karton = Karton::findOrFail($id);
 
    // Validasi input
    $request->validate([
        'kode' => 'required|unique:kartons,kode,' . $karton->id, // Pastikan kode unik kecuali untuk ID yang sedang diupdate
        'nama' => 'required|string|max:255',
        'ukuran' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:0',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'kode.unique' => 'Kode sudah digunakan, pilih kode yang lain!',
        'nama.required' => 'Nama harus diisi!',
        'ukuran.required' => 'Ukuran harus diisi!',
        'jumlah.required' => 'Jumlah harus diisi!',
        'jumlah.integer' => 'Jumlah harus berupa angka!',
        'jumlah.min' => 'Jumlah tidak boleh kurang dari 0!',
    ]);

    // Mengupdate data Karton
    $karton->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Karton berhasil diubah!');
}

}
