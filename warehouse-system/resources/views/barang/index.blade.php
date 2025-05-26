<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Warehouse System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Daftar Barang</h2>
                    <div>
                        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary">Pelanggan</a>
                        <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary">Transaksi</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Satuan</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($barangs as $barang)
                                    <tr>
                                        <td>{{ $barang->id_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>Rp {{ number_format($barang->harga_beli, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($barang->harga_jual, 0, ',', '.') }}</td>
                                        <td>{{ $barang->satuan_barang }}</td>
                                        <td>
                                            <span class="badge {{ $barang->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $barang->stok }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('barang.show', $barang->id_barang) }}" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('barang.edit', $barang->id_barang) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data barang</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>