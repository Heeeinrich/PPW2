@extends('auth.layouts')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h4 class="card-title mb-4">Edit Data Buku</h4>
        <!-- Make sure to include enctype for file upload -->
        <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-floating mb-3">
                <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" class="form-control" id="judulBuku" placeholder="Judul Buku" required>
                <label for="judulBuku">Judul Buku</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" class="form-control" id="penulisBuku" placeholder="Penulis Buku" required>
                <label for="penulisBuku">Penulis Buku</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="harga" value="{{ old('harga', $buku->harga) }}" class="form-control" id="hargaBuku" placeholder="Harga Buku" required>
                <label for="hargaBuku">Harga Buku</label>
            </div>

            <div class="form-floating mb-5">
                <input type="date" name="tgl_terbit" value="{{ old('tgl_terbit', $buku->tgl_terbit) }}" class="form-control" id="tglTerbitBuku" placeholder="Tanggal Terbit Buku" required>
                <label for="tglTerbitBuku">Tanggal Terbit Buku</label>
            </div>

            <!-- Add an optional file upload field -->
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail (Optional)</label>
                <input type="file" name="thumbnail" class="form-control" id="thumbnail" accept="image/*">
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>
            </div>

            <div>
                <a href="{{ route('buku.index') }}" class="btn btn-danger w-100">Kembali</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
