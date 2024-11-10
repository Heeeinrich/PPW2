<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <title>Halaman Buku</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="{{ URL('/') }}">Data Buku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <img src="{{asset('storage/'.$user->photo )}}" width="10px">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }} "
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
    </nav>

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
                                        <div class="col-md-3">
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
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
</body>
</html>
