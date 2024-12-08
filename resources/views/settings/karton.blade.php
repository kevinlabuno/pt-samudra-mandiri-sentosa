@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Packaging Materials</h1>
    <p>Form penambahan data Karton.</p>

    <div class="form-card-container">
     <h1 class="form-card-title">Karton</h1>
    <form action="{{ route('kartons.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" placeholder="Masukan Kode Karton.." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukan Nama Karton.." class="form-control" required>
        </div>
    <div class="form-group">
    <label for="ukuran">Ukuran Kaleng</label>
    <select id="ukuran" name="ukuran" class="form-control" required>
        <option value="">Pilih Ukuran Kaleng</option>
        @foreach ($ukuranOptions as $id => $ukuran)
            <option value="{{ $ukuran }}" {{ isset($kaleng) && $kaleng->ukuran == $ukuran ? 'selected' : '' }}>
                {{ $ukuran }}
            </option>
        @endforeach
    </select>
</div>
        <div class="form-group">
            <label for="jumlah">Jumlah Karton <i>(bh)</i></label>
            <input type="number" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Karton.." class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Karton</button>
    </form>
    </div>

    {{-- Tabel Karton --}}
    <h2>Data Karton</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Ukuran Kaleng</th>
                <th>Jumlah Karton <i>(bh)</i></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kartons as $karton)
            <tr>
                <td>{{ $karton->id }}</td>
                <td>{{ $karton->kode }}</td>
                <td>{{ $karton->nama }}</td>
                <td>{{ $karton->ukuran }}</td>
                <td>{{ $karton->jumlah }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editKarton({{ $karton }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('kartons.destroy', $karton->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Edit --}}
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Edit Karton</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            <div class="form-group">
                <label for="editKode">Kode Karton</label>
                <input type="text" id="editKode" name="kode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editNama">Nama Karton</label>
                <input type="text" id="editNama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editUkuran">Ukuran Kaleng</label>
                <select id="editUkuran" name="ukuran" class="form-control" required>
                <option value="">Pilih Ukuran Karton</option>
                @foreach ($ukuranOptions as $id => $ukuran)
                    <option value="{{ $ukuran }}" {{ $karton->ukuran == $ukuran ? 'selected' : '' }}>
                {{ $ukuran }}
                </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="editJumlah">Jumlah Karton<i>(bh)</i></label>
                <input type="number" id="editJumlah" name="jumlah" class="form-control" min="0" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editKarton(karton) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/kartons/${karton.id}`;
    document.getElementById('editId').value = karton.id;
    document.getElementById('editKode').value = karton.kode;
    document.getElementById('editNama').value = karton.nama;
    document.getElementById('editUkuran').value = karton.ukuran;
    document.getElementById('editJumlah').value = karton.jumlah;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
