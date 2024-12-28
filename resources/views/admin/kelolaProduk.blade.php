<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayumi Florist</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li>
                <a href="{{ url('/admin/home') }}">
                    <i class="fas fa-home"></i> Beranda
                </a>
            </li>
            <li class="active">
                <a href="{{ url('/admin/kelolaProduk') }}">
                    <i class="fas fa-box"></i> Kelola Produk
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cogs"></i> Kelola Penyewaan
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user-circle"></i> Akun
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-container">
                <img src="/images/mitra.png" alt="Ayumi Florist Logo" class="logo">
                <span class="navbar-title">Ayumi Florist</span>
            </div>
        </nav>

        <!-- Content -->
        <div class="content">
            <!-- Kelola Produk -->
             <br><br><br>
            <h5 class="kelper">Kelola Produk</h5>

            <!-- Tabel Data Papan -->
            <h2 class="table-title" align="center">Data Papan</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID Papan</th>
            <th>Jenis Papan</th>
            <th>Bentuk</th>
            <th>Ukuran</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataPapan as $papan)
        <tr>
            <td>{{ $papan->id_papan }}</td>
            <td>{{ $papan->jenis_papan }}</td>
            <td>{{ $papan->bentuk }}</td>
            <td>{{ $papan->ukuran ?? '-' }}</td>
            <td>{{ $papan->stok }}</td>
            <td>
                <!-- Tombol "Ubah" berwarna hijau -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal{{ $papan->id_papan }}">
                    <i class="fas fa-edit"></i> Ubah
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Edit Data Papan -->
@foreach($dataPapan as $papan)
<div class="modal fade" id="editModal{{ $papan->id_papan }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Papan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/kelolaProduk/update/' . $papan->id_papan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jenis_papan">Jenis Papan</label>
                        <input type="text" class="form-control" id="jenis_papan" name="jenis_papan" value="{{ old('jenis_papan', $papan->jenis_papan) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bentuk">Bentuk</label>
                        <input type="text" class="form-control" id="bentuk" name="bentuk" value="{{ old('bentuk', $papan->bentuk) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ old('ukuran', $papan->ukuran) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $papan->stok) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

                </tbody>
            </table>

            <!-- Tabel Data Produk Paket -->
            <h2 align="center">Data Produk Paket</h2>
            <table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jenis Papan</th>
            <th>Jumlah Papan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataProduk as $produk)
        <tr>
            <td>{{ $produk->id_produk }}</td>
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->harga }}</td>
            <td>{{ $produk->jenis_papan }}</td>
            <td>{{ $produk->jumlah_papan }}</td>
            <td><img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="50"></td>
            <td>
                <!-- Tombol "Ubah" berwarna hijau -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editProdukModal{{ $produk->id_produk }}">
                    <i class="fas fa-edit"></i> Ubah
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Edit Data Papan -->
@foreach($dataPapan as $papan)
<div class="modal fade" id="editModal{{ $papan->id_papan }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Papan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ url('/admin/kelolaProduk/update/' . $papan->id_papan) }}" method="POST" enctype="multipart/form-data">
            @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jenis_papan">Jenis Papan</label>
                        <input type="text" class="form-control" id="jenis_papan" name="jenis_papan" value="{{ old('jenis_papan', $papan->jenis_papan) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bentuk">Bentuk</label>
                        <input type="text" class="form-control" id="bentuk" name="bentuk" value="{{ old('bentuk', $papan->bentuk) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ old('ukuran', $papan->ukuran) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $papan->stok) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
           <!-- Modal Edit Produk Paket -->
@foreach($dataProduk as $produk)
<div class="modal fade" id="editProdukModal{{ $produk->id_produk }}" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Produk Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin/kelolaProduk/updateProduk/' . $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_papan">Jenis Papan</label>
                        <input type="text" class="form-control" id="jenis_papan" name="jenis_papan" value="{{ $produk->jenis_papan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_papan">Jumlah Papan</label>
                        <input type="number" class="form-control" id="jumlah_papan" name="jumlah_papan" value="{{ $produk->jumlah_papan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        <small>Current Image:</small>
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Current Image" width="50">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
        </div>
    </div>

    <!-- Bootstrap JS & Dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>