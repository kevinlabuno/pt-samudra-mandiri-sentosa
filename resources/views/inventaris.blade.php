@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Inventaris</h1>
    <p>Atur Data Inventaris</p>
    
    <!-- Form Tambah Data -->
    <form action="{{ route('inventaris.store') }}" method="POST" class="unique-form">
        @csrf

        <div class="unique-form-row">
            <!-- Kode Ikan -->
            <div class="unique-form-group">
                <label for="kode_ikan">Kode Ikan</label>
                <select id="kode_ikan" name="kode_ikan" onchange="updateNamaIkan()" required>
                    <option value="" disabled selected>Pilih Kode Ikan</option>
                    @foreach($ikans as $ikan)
                        <option value="{{ $ikan->kode }}" data-nama="{{ $ikan->nama }}">{{ $ikan->kode }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Ikan (Read-only) -->
            <div class="unique-form-group">
                <label for="nama_ikan">Nama Ikan</label>
                <input type="text" id="nama_ikan" name="nama_ikan" placeholder="Nama ikan akan terisi otomatis" readonly>
            </div>

            <!-- Ukuran Ikan -->
            <div class="unique-form-group">
                <label for="ukuran_ikan">Ukuran Ikan</label>
                <input type="text" id="ukuran_ikan" name="ukuran_ikan" placeholder="Masukan ukuran ikan" required>
            </div>
        </div>

        <div class="unique-form-row">
            <!-- Net Weight -->
            <div class="unique-form-group">
                <label for="net_weight">Net Weight <i>(gr)</i></label>
                <input type="number" id="net_weight" name="net_weight" placeholder="Masukan net weight" required>
            </div>

            <!-- Drain Weight -->
            <div class="unique-form-group">
                <label for="drain_weight">Drain Weight <i>(gr)</i></label>
                <input type="number" id="drain_weight" name="drain_weight" placeholder="Masukan drain weight" required>
            </div>
        </div>

        <div class="unique-form-row">
            <!-- Flakes -->
            <div class="unique-form-group">
                <label for="flakes">Flakes <i>(%)</i></label>
                <input type="number" id="flakes" name="flakes" placeholder="Masukan jumlah flakes" required>
            </div>

            <!-- Recovery -->
            <div class="unique-form-group">
                <label for="recovery">Recovery  <i>(%)</i></label>
                <input type="number" id="recovery" name="recovery" placeholder="Masukan recovery (%)" required>
            </div>
        </div>

        <div class="unique-form-row">
            <!-- Keadaan Ikan -->
            <div class="unique-form-group">
                <label for="keadaan_ikan">Keadaan Ikan</label>
                <select id="keadaan_ikan" name="keadaan_ikan" required>
                    <option value="" disabled selected>Pilih Keadaan Ikan</option>
                    <option value="Fresh">Fresh</option>
                    <option value="Not Fresh">Not Fresh</option>
                </select>
            </div>

            <!-- Jumlah -->
            <div class="unique-form-group">
                <label for="jumlah">Jumlah <i>(ekor)</i></label>
                <input type="number" id="jumlah" name="jumlah" placeholder="Masukan jumlah ikan" required>
            </div>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="unique-btn">Tambah Data</button>
    </form>

    <hr>
    <br>

    <!-- Tabel Data Inventaris -->
    <div class="table-container">
        <div class="table-title">Data Inventaris</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Ikan</th>
                    <th>Nama Ikan</th>
                    <th>Ukuran</th>
                    <th>Net Weight <i>(gr)</i></th>
                    <th>Drain Weight  <i>(gr)</i></th>
                    <th>Flakes <i>(%)</i></th>
                    <th>Recovery <i>(%)</i></th>
                    <th>Keadaan</th>
                    <th>Jumlah <i>(ekor)</i></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventaris as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->kode_ikan }}</td>
                    <td>{{ $item->nama_ikan }}</td>
                    <td>{{ $item->ukuran_ikan }}</td>
                    <td>{{ $item->net_weight }}</td>
                    <td>{{ $item->drain_weight }}</td>
                    <td>{{ $item->flakes }}</td>
                    <td>{{ $item->recovery }}</td>
                    <td>{{ $item->keadaan_ikan }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>
                        <div class="action-btns">
                            <a href="javascript:void(0)" onclick="editInventaris({{ $item }})" class="btn btn-primary">Edit</a>
                            <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Edit --}}
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Edit Data Inventaris</h3>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="editId">
            
            <!-- Kode Ikan -->
            <div class="form-group">
                <label for="editKodeIkan">Kode Ikan</label>
                <select id="editKodeIkan" name="kode_ikan" onchange="updateEditNamaIkan()" required>
                    <option value="" disabled>Pilih Kode Ikan</option>
                    @foreach($ikans as $ikan)
                        <option value="{{ $ikan->kode }}" data-nama="{{ $ikan->nama }}">{{ $ikan->kode }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Ikan (Read-only) -->
            <div class="form-group">
                <label for="editNamaIkan">Nama Ikan</label>
                <input type="text" id="editNamaIkan" name="nama_ikan" readonly>
            </div>

            <!-- Ukuran Ikan -->
            <div class="form-group">
                <label for="editUkuranIkan">Ukuran Ikan</label>
                <input type="text" id="editUkuranIkan" name="ukuran_ikan" class="form-control" required>
            </div>

            <!-- Net Weight -->
            <div class="form-group">
                <label for="editNetWeight">Net Weight <i>(gr)</i></label>
                <input type="number" id="editNetWeight" name="net_weight" class="form-control" required>
            </div>

            <!-- Drain Weight -->
            <div class="form-group">
                <label for="editDrainWeight">Drain Weight <i>(gr)</i></label>
                <input type="number" id="editDrainWeight" name="drain_weight" class="form-control" required>
            </div>

            <!-- Flakes -->
            <div class="form-group">
                <label for="editFlakes">Flakes <i>(%)</i></label>
                <input type="number" id="editFlakes" name="flakes" class="form-control" required>
            </div>

            <!-- Recovery -->
            <div class="form-group">
                <label for="editRecovery">Recovery <i>(%)</i></label>
                <input type="number" id="editRecovery" name="recovery" class="form-control" required>
            </div>

            <!-- Keadaan Ikan -->
            <div class="form-group">
                <label for="editKeadaanIkan">Keadaan Ikan</label>
                <select id="editKeadaanIkan" name="keadaan_ikan" required>
                    <option value="Fresh">Fresh</option>
                    <option value="Not Fresh">Not Fresh</option>
                </select>
            </div>

            <!-- Jumlah -->
            <div class="form-group">
                <label for="editJumlah">Jumlah <i>(ekor)</i></label>
                <input type="number" id="editJumlah" name="jumlah" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</div>

<script>
    function updateNamaIkan() {
        const kodeIkanSelect = document.getElementById('kode_ikan');
        const selectedOption = kodeIkanSelect.options[kodeIkanSelect.selectedIndex];
        const namaIkan = selectedOption.getAttribute('data-nama');
        document.getElementById('nama_ikan').value = namaIkan;
    }

    function updateEditNamaIkan() {
        const kodeIkanSelect = document.getElementById('editKodeIkan');
        const selectedOption = kodeIkanSelect.options[kodeIkanSelect.selectedIndex];
        const namaIkan = selectedOption.getAttribute('data-nama');
        document.getElementById('editNamaIkan').value = namaIkan;
    }

    function editInventaris(data) {
        document.getElementById('editModal').style.display = 'block';
        document.getElementById('editForm').action = `/inventaris/${data.id}`;
        document.getElementById('editKodeIkan').value = data.kode_ikan;
        document.getElementById('editNamaIkan').value = data.nama_ikan;
        document.getElementById('editUkuranIkan').value = data.ukuran_ikan;
        document.getElementById('editNetWeight').value = data.net_weight;
        document.getElementById('editDrainWeight').value = data.drain_weight;
        document.getElementById('editFlakes').value = data.flakes;
        document.getElementById('editRecovery').value = data.recovery;
        document.getElementById('editKeadaanIkan').value = data.keadaan_ikan;
        document.getElementById('editJumlah').value = data.jumlah;
    }

    function closeModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>

@endsection
