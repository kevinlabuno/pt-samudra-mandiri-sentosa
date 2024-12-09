@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar User</h1>

    {{-- Form Tambah User --}}
    <div class="form-card-container">
        <h1 class="form-card-title">Tambah User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="Marketing">Marketing</option>
                    <option value="Manajer Produksi">Manajer Produksi</option>
                    <option value="Gudang">Gudang</option>
                    <option value="General Manager">General Manager</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah User</button>
        </form>
    </div>

    {{-- Tabel User --}}
    <h2>Data User</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button class="btn btn-warning" onclick="editUser({{ $user }})">Edit</button>
                    {{-- Tombol Hapus --}}
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
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
        <h3>Edit User</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            <div class="form-group">
                <label for="editName">Nama</label>
                <input type="text" id="editName" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editRole">Role</label>
                <select id="editRole" name="role" class="form-control" required>
                    <option value="Marketing">Marketing</option>
                    <option value="Manajer Produksi">Manajer Produksi</option>
                    <option value="Gudang">Gudang</option>
                    <option value="General Manager">General Manager</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" id="editEmail" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
function editUser(user) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = `/users/${user.id}`;
    document.getElementById('editId').value = user.id;
    document.getElementById('editName').value = user.name;
    document.getElementById('editRole').value = user.role;
    document.getElementById('editEmail').value = user.email;
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
