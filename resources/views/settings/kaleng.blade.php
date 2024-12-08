@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Packaging Materials</h1>
    <p>Form penambahan data Kaleng.</p>

    <div class="form-card-container">
    <h1 class="form-card-title">Kaleng</h1>
    <form action="{{ route('kalengs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode Kaleng</label>
            <input type="text" id="kode" name="kode" placeholder="Masukan Kode Kaleng.." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama Kaleng</label>
            <input type="text" id="nama" name="nama" placeholder="Masukan Nama Kaleng.." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ukuran">Ukuran Kaleng</label>
            <input type="text" id="ukuran" name="ukuran" placeholder="Masukan Ukuran Kaleng.." class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kaleng</button>
    </form>
    </div>

    {{-- Tabel Kaleng --}}
    <h2>Data Kaleng</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kalengs as $kaleng)
            <tr>
                <td>{{ $kaleng->id }}</td>
                <td>{{ $kaleng->kode }}</td>
                <td>{{ $kaleng->nama }}</td>
                <td>{{ $kaleng->ukuran }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editKaleng({{ $kaleng }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('kalengs.destroy', $kaleng->id) }}" method="POST" style="display:inline-block;">
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
        <h3>Edit Kaleng</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            <div class="form-group">
                <label for="editKode">Kode</label>
                <input type="text" id="editKode" name="kode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editNama">Nama</label>
                <input type="text" id="editNama" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editUkuran">Ukuran</label>
                <input type="text" id="editUkuran" name="ukuran" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editKaleng(kaleng) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/kalengs/${kaleng.id}`;
    document.getElementById('editId').value = kaleng.id;
    document.getElementById('editKode').value = kaleng.kode;
    document.getElementById('editNama').value = kaleng.nama;
    document.getElementById('editUkuran').value = kaleng.ukuran;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
