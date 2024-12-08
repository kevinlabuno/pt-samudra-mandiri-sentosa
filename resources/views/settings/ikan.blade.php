@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Ikan</h1>

    <div class="form-card-container">
    <h1 class="form-card-title">Ikan</h1>
    <form action="{{ route('ikans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Ikan</button>
    </form>
    </div>

    {{-- Tabel Ikan --}}
    <h2>Data Ikan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ikans as $ikan)
            <tr>
                <td>{{ $ikan->id }}</td>
                <td>{{ $ikan->kode }}</td>
                <td>{{ $ikan->nama }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editIkan({{ $ikan }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('ikans.destroy', $ikan->id) }}" method="POST" style="display:inline-block;">
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
        <h3>Edit Ikan</h3>
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
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editIkan(ikan) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/ikans/${ikan.id}`;
    document.getElementById('editId').value = ikan.id;
    document.getElementById('editKode').value = ikan.kode;
    document.getElementById('editNama').value = ikan.nama;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
