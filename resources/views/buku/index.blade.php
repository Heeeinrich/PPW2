<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <title>Halaman Buku</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Buku</h1>

        <div class="mb-3">
            <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
        </div>

        <div class="mb-3">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
        </div>

        <div class="mb-3">
            @if (count($data_buku))
                <div class="alert alert-success">
                    Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata <strong>{{ $cari }}</strong>
                </div>
            @else
                <div class="alert alert-warning">
                    <h4>Data {{ $cari }} tidak ditemukan</h4>
                    <a href="/buku" class="btn btn-warning">Kembali</a>
                </div>
            @endif
        </div>

        <div>
            <form action="{{ route('buku.search') }}" method="GET" class="mb-3">
                @csrf
                <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; display: inline; margin-top: 10px; float: right;">
            </form>
        </div>

        <div class="clearfix"></div>

        <table id="myTable" class="display table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_buku as $index => $buku)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin mau di hapus')" type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <

        <script>
            $(document).ready(function () {
                $('#myTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "lengthMenu": [5, 10, 25, 50, 100],
                    "pageLength": 10
                });
            });
        </script>

        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $data_buku->links('pagination::bootstrap-5') }}
        </div> --}}

        <div class="mt-3">
            <strong>Jumlah Buku: {{ $jumlah_buku }}</strong>
        </div>

        <div class="mt-2">
            <p>Total Data: {{ $jumlah_buku }} Buku</p>
            <p>Total Harga: {{ "Rp. " . number_format($total_harga, 2, ',', '.') }}</p>
        </div>
    </div>
</body>
</html>
