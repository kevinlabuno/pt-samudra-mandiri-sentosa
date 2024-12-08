<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bom;
use App\Models\Item;

class BomController extends Controller
{
    // Tampilkan halaman utama
    public function index()
    {
        $boms = Bom::all(); // Ambil semua data Bom
        $itemOptions = Item::pluck('nama', 'kode');
        return view('settings.bom', compact('boms','itemOptions'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:boms,kode',
            'deskripsi' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'status' => 'required|string|in:Aktif,Tidak Aktif', // Validasi status
            'default' => 'required|boolean',
        ], [
            'kode.required' => 'Kode harus diisi!',
            'kode.unique' => 'Kode sudah ada, gunakan kode lain!',
            'deskripsi.required' => 'Deskripsi harus diisi!',
            'deskripsi.string' => 'Deskripsi harus berupa teks!',
            'item.required' => 'Item harus diisi!',
            'item.string' => 'Item harus berupa teks!',
            'status.required' => 'Status harus diisi!',
            'status.in' => 'Status harus berupa "Aktif" atau "Tidak Aktif"!',
            'default.required' => 'Default harus diisi!',
            'default.boolean' => 'Default harus berupa nilai boolean!',
        ]);

        Bom::create($request->all()); // Simpan data

        return redirect()->back()->with('success', 'Data Bom berhasil ditambahkan!');
    }

    // Hapus data
    public function destroy($id)
    {
        $bom = Bom::findOrFail($id);
        $bom->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data Bom berhasil dihapus!');
    }

    // Update data
    public function update(Request $request, $id)
    {
        // Menemukan data Bom berdasarkan ID
        $bom = Bom::findOrFail($id);

        // Validasi input
        $request->validate([
            'kode' => 'required|string|max:255|unique:boms,kode,' . $id, // Validasi kode agar unik kecuali untuk ID yang sedang diupdate
            'deskripsi' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'status' => 'required|string|in:Aktif,Tidak Aktif', // Validasi status
            'default' => 'required|boolean',
        ], [
            'kode.required' => 'Kode harus diisi!',
            'kode.unique' => 'Kode sudah digunakan, pilih kode yang lain!',
            'deskripsi.required' => 'Deskripsi harus diisi!',
            'deskripsi.string' => 'Deskripsi harus berupa string!',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 255 karakter!',
            'item.required' => 'Item harus diisi!',
            'item.string' => 'Item harus berupa string!',
            'item.max' => 'Item tidak boleh lebih dari 255 karakter!',
            'status.required' => 'Status harus diisi!',
            'status.in' => 'Status harus berupa "Aktif" atau "Tidak Aktif"!',
            'status.max' => 'Status tidak boleh lebih dari 255 karakter!',
            'default.required' => 'Default harus dipilih!',
            'default.boolean' => 'Default harus berupa nilai boolean!',
        ]);

        // Mengupdate data Bom
        $bom->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data Bom berhasil diubah!');
    }
}
