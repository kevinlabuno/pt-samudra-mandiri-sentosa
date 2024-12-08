<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // Tampilkan halaman utama
    public function index()
    {
        $items = Item::all(); // Ambil semua data Item
        return view('settings.item', compact('items'));
    }

    // Simpan data baru
public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|string|max:255|unique:items,kode',
        'nama' => 'required|string|max:255',
    ], [
        'kode.required' => 'Kode item harus diisi!',
        'kode.string' => 'Kode item harus berupa teks!',
        'kode.max' => 'Kode item tidak boleh lebih dari 255 karakter!',
        'kode.unique' => 'Kode item sudah ada, gunakan kode lain!',
        'nama.required' => 'Nama item harus diisi!',
        'nama.string' => 'Nama item harus berupa teks!',
        'nama.max' => 'Nama item tidak boleh lebih dari 255 karakter!',
    ]);

    Item::create($request->all()); // Simpan data

    return redirect()->back()->with('success', 'Data Item berhasil ditambahkan!');
}


    // Hapus data
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data Item berhasil dihapus!');
    }

    // Update data
public function update(Request $request, $id)
{
    // Menemukan data Item berdasarkan ID
    $item = Item::findOrFail($id);

    // Validasi input
    $request->validate([
        'kode' => 'required|string|max:255|unique:items,kode,' . $id, // Pastikan kode unik kecuali untuk ID yang sedang diupdate
        'nama' => 'required|string|max:255',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'kode.unique' => 'Kode sudah digunakan, pilih kode yang lain!',
        'nama.required' => 'Nama harus diisi!',
    ]);

    // Mengupdate data Item
    $item->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Item berhasil diubah!');
}

}
