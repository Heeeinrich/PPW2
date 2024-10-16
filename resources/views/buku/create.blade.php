<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="card-title mb-4">Tambah Buku</h4>
            @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('buku.store') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="judul" class="form-control" id="judulBuku" placeholder="Judul Buku">
                    <label for="judulBuku">Judul Buku</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="penulis" class="form-control" id="penulisBuku" placeholder="Penulis Buku">
                    <label for="penulisBuku">Penulis Buku</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="harga" class="form-control" id="hargaBuku" placeholder="Harga Buku">
                    <label for="hargaBuku">Harga Buku</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="date" name="tgl_terbit" class="form-control" id="tglTerbitBuku"
                        placeholder="Tanggal Terbit Buku">
                    <label for="tglTerbitBuku">Tanggal Terbit Buku</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                <div>
                    <a href="{{ '/buku' }}" class="btn btn-danger w-100">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
