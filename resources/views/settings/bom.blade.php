@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Item dan Bill of Materials (BOM)</h1>

    <!-- Form Card to Add BOM -->
    <div class="form-card-container">
        <h1 class="form-card-title">(BOM)</h1>
        <form action="{{ route('boms.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode">Kode (BOM) <i>(Loiner)</i></label>
                <input type="text" id="kode" name="kode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="item">Item</label>
                <select id="item" name="item" class="form-control" required>
                    <option value="">Pilih Item</option>
                    @foreach ($itemOptions as $kode => $nama)
                        <option value="{{ $kode }}">{{ $kode }} - {{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="default">Default</label>
                <select id="default" name="default" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah BOM</button>
        </form>
    </div>

    <!-- BOM Data Table -->
    <h2>Data (BOM)</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode (Loiner)</th>
                <th>Deskripsi</th>
                <th>Item</th>
                <th>Status</th>
                <th>Default</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boms as $bom)
                <tr>
                    <td>{{ $bom->id }}</td>
                    <td>{{ $bom->kode }}</td>
                    <td>{{ $bom->deskripsi }}</td>
                    <td>{{ $bom->item }}</td>
                    <td>{{ $bom->status }}</td>
                    <td>{{ $bom->default ? 'Yes' : 'No' }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-warning" onclick="editBom({{ $bom->id }}, '{{ $bom->kode }}', '{{ $bom->deskripsi }}', '{{ $bom->item }}', '{{ $bom->status }}', {{ $bom->default }})">Edit</button>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('boms.destroy', $bom->id) }}" method="POST" style="display:inline-block;">
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

<!-- Modal Edit BOM -->
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Edit BOM</h3>
        <form id="editForm" method="POST" action="{{ route('boms.update', '') }}">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId" name="id">
            
            <div class="form-group">
                <label for="editKode">Kode</label>
                <input type="text" id="editKode" name="kode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editDeskripsi">Deskripsi</label>
                <input type="text" id="editDeskripsi" name="deskripsi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editItem">Item</label>
                <select id="editItem" name="item" class="form-control" required>
                    <option value="">Pilih Item</option>
                    @foreach ($itemOptions as $kode => $nama)
                        <option value="{{ $kode }}">{{ $kode }} - {{ $nama }}</option>
                    @endforeach
                </select>
            </div>
                <div class="form-group">
                    <label for="editStatus">Status</label>
                    <select id="editStatus" name="status" class="form-control" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            <div class="form-group">
                <label for="editDefault">Default</label>
                <select id="editDefault" name="default" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
    function editBom(id, kode, deskripsi, item, status, defaultValue) {
        // Set the form action URL dynamically based on the BOM ID
        document.getElementById('editForm').action = '/boms/' + id;

        // Populate form fields with the selected BOM data
        document.getElementById('editId').value = id;
        document.getElementById('editKode').value = kode;
        document.getElementById('editDeskripsi').value = deskripsi;
        document.getElementById('editItem').value = item;
        document.getElementById('editStatus').value = status;
        document.getElementById('editDefault').value = defaultValue;

        // Show the modal
        document.getElementById('editModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>

@endsection
