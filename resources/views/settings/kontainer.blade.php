@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Packaging Materials</h1>
    <p>Form penambahan data Kontainer.</p>

    <div class="form-card-container">
        <h1 class="form-card-title">Kontainer</h1>
        <form action="{{ route('kontainer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" id="kode" name="kode" placeholder="Masukan Kode Kontainer.." required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukan Nama Kontainer.." required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Karton <i>(bh)</i></label>
                <input type="number" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Karton.." min="0" required>
            </div>
            <button type="submit" class="form-submit-btn">Simpan</button>
        </form>
    </div>

    <div class="table-container">
        <div class="table-title">Data Kontainer</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jumlah <i>(bh)</i></th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kontainers as $kontainer)
                <tr>
                    <td>{{ $kontainer->id }}</td>
                    <td>{{ $kontainer->kode }}</td>
                    <td>{{ $kontainer->nama }}</td>
                    <td>{{ $kontainer->jumlah }}</td>
                    <td>
                        <div class="action-btns">
                            <button class="btn btn-primary" onclick="editData({{ $kontainer }})">Ubah</button>
                            <form action="{{ route('kontainer.destroy', $kontainer->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit Data Kontainer</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId" name="id">
            <div class="form-group">
                <label for="editKode">Kode</label>
                <input type="text" id="editKode" name="kode" required>
            </div>
            <div class="form-group">
                <label for="editNama">Nama</label>
                <input type="text" id="editNama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="editJumlah">Jumlah Karton <i>(bh)</i></label>
                <input type="number" id="editJumlah" name="jumlah" min="0" required>
            </div>
            <button type="submit" class="form-submit-btn">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editData(kontainer) {
    document.getElementById('editId').value = kontainer.id;
    document.getElementById('editKode').value = kontainer.kode;
    document.getElementById('editNama').value = kontainer.nama;
    document.getElementById('editJumlah').value = kontainer.jumlah;
    document.getElementById('editForm').action = `/kontainer/${kontainer.id}`;
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>

@endsection
