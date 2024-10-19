<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
    </script>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="card-title mb-4">Edit Data Buku</h4>
            <form method="POST" action="{{ route('buku.update',$buku->id) }}">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="judul" value="{{ $buku -> judul }}" class="form-control" id="judulBuku" placeholder="Judul Buku">
                    <label for="judulBuku">Judul Buku</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="penulis" value="{{ $buku -> penulis }}" class="form-control" id="penulisBuku" placeholder="Penulis Buku">
                    <label for="penulisBuku">Penulis Buku</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="harga" value="{{ $buku -> harga }}" class="form-control" id="hargaBuku" placeholder="Harga Buku">
                    <label for="hargaBuku">Harga Buku</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" name="tanggal_terbit" class="form-control" id="datepicker" placeholder="Tanggal Terbit Buku">
                    <label for="datepicker">Tanggal Terbit Buku</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>
                </div>
                <div>
                    <a href="{{ '/buku' }}" class="btn btn-danger w-100">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
