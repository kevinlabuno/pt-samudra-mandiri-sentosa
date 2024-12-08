@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Tenaga Kerja</h1>

    <div class="form-card-container">
    <h1 class="form-card-title">Tenaga Kerja</h1>
    <form action="{{ route('tenagas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="skinning">Skinning <i>(Loiner)</i></label>
            <input type="text" id="skinning" name="skinning" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kerja">Kerja Lonainer/Jam <i>(kg)</i></label>
            <input type="text" id="kerja" name="kerja" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Tenaga</button>
    </form>
    </div>

    {{-- Tabel Tenaga --}}
    <h2>Data Tenaga</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Skinning <i>(Loiner)</i></th>
                <th>Kerja Lonainer/Jam <i>(kg)</i></th>
                <th>Jumlah </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenagas as $tenaga)
            <tr>
                <td>{{ $tenaga->id }}</td>
                <td>{{ $tenaga->skinning }}</td>
                <td>{{ $tenaga->kerja }}</td>
                <td>{{ $tenaga->jumlah }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editTenaga({{ $tenaga }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('tenagas.destroy', $tenaga->id) }}" method="POST" style="display:inline-block;">
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
        <h3>Edit Tenaga</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            <div class="form-group">
                <label for="editSkinning">Skinning</label>
                <input type="text" id="editSkinning" name="skinning" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editKerja">Kerja</label>
                <input type="text" id="editKerja" name="kerja" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editJumlah">Jumlah</label>
                <input type="number" id="editJumlah" name="jumlah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editTenaga(tenaga) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/tenagas/${tenaga.id}`;
    document.getElementById('editSkinning').value = tenaga.skinning;
    document.getElementById('editKerja').value = tenaga.kerja;
    document.getElementById('editJumlah').value = tenaga.jumlah;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
