@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Mesin</h1>

    <div class="form-card-container">
        <h1 class="form-card-title">Mesin</h1>
    <form action="{{ route('mesins.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" id="kapasitas" name="kapasitas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="efesiensi">Efesiensi Mesin 7Jam <i>(%)</i></label>
            <input type="number" id="efesiensi" name="efesiensi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Mesin</button>
    </form>
   </div>
    {{-- Tabel Mesin --}}
    <h2>Data Mesin</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Kapasitas</th>
                <th>Efesiensi (%)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mesins as $mesin)
            <tr>
                <td>{{ $mesin->id }}</td>
                <td>{{ $mesin->kode }}</td>
                <td>{{ $mesin->kapasitas }}</td>
                <td>{{ $mesin->efesiensi }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editMesin({{ $mesin }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('mesins.destroy', $mesin->id) }}" method="POST" style="display:inline-block;">
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
        <h3>Edit Mesin</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            <div class="form-group">
                <label for="editKode">Kode</label>
                <input type="text" id="editKode" name="kode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editKapasitas">Kapasitas</label>
                <input type="number" id="editKapasitas" name="kapasitas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editEfesiensi">Efesiensi (%)</label>
                <input type="number" id="editEfesiensi" name="efesiensi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editMesin(mesin) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/mesins/${mesin.id}`;
    document.getElementById('editKode').value = mesin.kode;
    document.getElementById('editKapasitas').value = mesin.kapasitas;
    document.getElementById('editEfesiensi').value = mesin.efesiensi;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
