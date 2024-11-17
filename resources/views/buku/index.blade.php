@extends('auth.layouts')

@section('content')
<div class="container mt-5">
    <h1>Buku</h1>

    <div class="mb-3">
        @auth
            <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
        @endauth
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
                <a href="{{ route('buku.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        @endif
    </div>

    <div>
        <form action="{{ route('buku.search') }}" method="GET" class="mb-3">
            @csrf
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; display: inline; margin-top: 10px; float: right;">
        </form>
    </div>

    <div>
        <table id="myTable" class="display table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Cover</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Publication Year</th>
                    @auth
                    <th>Action</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($data_buku as $index => $buku)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if ($buku->filepath)
                                <div class="relative h-10 w-10">
                                    <img src="{{ asset($buku->filepath) }}" alt=""
                                        class="h-full w-full rounded-full object-cover object-center">
                                </div>
                            @endif
                        </td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        <td>
                            @auth
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-md-3 mr-5">
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau di hapus')" type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Make sure jQuery and DataTables are loaded before initializing DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the DataTable
            $('#myTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50, 100],
                "pageLength": 10,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                }
            });
        });
    </script>
@endsection

