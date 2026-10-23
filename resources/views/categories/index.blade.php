<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-add { text-decoration: none; padding: 5px 10px; background: #28a745; color: white; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
        .btn-edit { text-decoration: none; padding: 4px 8px; background: #ffc107; color: black; border-radius: 3px; display: inline-block; }
        .btn-delete { padding: 4px 8px; background: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer; }
        .btn-back { text-decoration: none; padding: 5px 10px; background: #6c757d; color: white; border-radius: 4px; display: inline-block; margin-bottom: 10px; margin-right: 10px;}
        .alert-success { padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>Daftar Kategori Buku</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('books.index') }}" class="btn-back">Kembali ke Buku</a>
    <a href="{{ route('categories.create') }}" class="btn-add">+ Tambah Kategori Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Slug URL</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">Belum ada data kategori. Silakan tambahkan!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>