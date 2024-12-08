@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Item dan Bill of Materials (BOM)</h1>

    <div class="form-card-container">
    <h1 class="form-card-title">Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Item</button>
    </form>
    </div>

    {{-- Tabel Item --}}
    <h2>Data Item</h2>
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
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editItem({{ $item }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
        <h3>Edit Item</h3>
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
function editItem(item) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/items/${item.id}`;
    document.getElementById('editKode').value = item.kode;
    document.getElementById('editNama').value = item.nama;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
