<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontainer;

class KontainerController extends Controller
{
    public function index()
    {
        $kontainers = Kontainer::all();
        return view('settings.kontainer', compact('kontainers'));
    }

public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:0',
    ], [
        'kode.required' => 'Kode kontainer harus diisi!',
        'kode.string' => 'Kode kontainer harus berupa teks!',
        'kode.max' => 'Kode kontainer tidak boleh lebih dari 255 karakter!',
        'nama.required' => 'Nama kontainer harus diisi!',
        'nama.string' => 'Nama kontainer harus berupa teks!',
        'nama.max' => 'Nama kontainer tidak boleh lebih dari 255 karakter!',
        'jumlah.required' => 'Jumlah kontainer harus diisi!',
        'jumlah.integer' => 'Jumlah kontainer harus berupa angka bulat!',
        'jumlah.min' => 'Jumlah kontainer tidak boleh kurang dari 0!',
    ]);

    Kontainer::create($request->all()); // Simpan data

    return redirect()->back()->with('success', 'Data Berhasil Disimpan');
}


public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'kode' => 'required|string|max:255',
        'nama' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:0',
    ], [
        'kode.required' => 'Kode harus diisi!',
        'nama.required' => 'Nama harus diisi!',
        'jumlah.required' => 'Jumlah harus diisi!',
        'jumlah.integer' => 'Jumlah harus berupa angka!',
        'jumlah.min' => 'Jumlah tidak boleh kurang dari 0!',
    ]);

    // Menemukan data berdasarkan ID
    $kontainer = Kontainer::findOrFail($id);

    // Mengupdate data dengan input yang valid
    $kontainer->update($request->all());

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data Berhasil Diubah');
}


    public function destroy($id)
    {
        $kontainer = Kontainer::findOrFail($id);
        $kontainer->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
