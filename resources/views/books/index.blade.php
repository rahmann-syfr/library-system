<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku Perpustakaan</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-add { text-decoration: none; padding: 5px 10px; background: #28a745; color: white; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
        .btn-edit { text-decoration: none; padding: 4px 8px; background: #ffc107; color: black; border-radius: 3px; display: inline-block; }
        .btn-delete { padding: 4px 8px; background: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .btn-category { text-decoration: none; padding: 5px 10px; background: #17a2b8; color: white; border-radius: 4px; display: inline-block; margin-left: 10px; }
        .btn-logout { padding: 5px 10px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px; font-size: 16px; }
        .alert-success { padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>Daftar Buku Perpustakaan</h2>

    <!-- Menangkap dan menampilkan flash message (notifikasi sukses) -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('books.create') }}" class="btn-add">+ Tambah Buku Baru</a>
    <a href="{{ route('categories.index') }}" class="btn-category">Kelola Kategori</a>
    
    <!-- Tombol Kelola Pengguna hanya muncul untuk role Admin -->
    @can('manage-users')
        <a href="{{ route('users.index') }}" class="btn-category" style="background:#6c757d;">Kelola Pengguna</a>
    @endcan
    
    <!-- Form Logout dari Materi 12 -->
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <!-- Menampilkan nama kategori berkat relasi Eloquent -->
                <td>{{ $book->category->name ?? 'Tanpa Kategori' }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Belum ada data buku. Silakan tambahkan buku baru!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>