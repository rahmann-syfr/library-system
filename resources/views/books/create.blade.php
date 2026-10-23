<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
</head>
<body>
    <h2>Form Tambah Buku Perpustakaan</h2>

    <!-- Form mengirim data menggunakan metode POST ke route books.store -->
    <form action="{{ route('books.store') }}" method="POST">
        @csrf <!-- Token keamanan wajib di Laravel untuk form POST -->
        
        <p>
            <label>Judul Buku:</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ old('author') }}" required>
            @error('author')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label>Kategori:</label><br>
            <select name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" value="{{ old('year') }}" required>
            @error('year')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}" required>
            @error('stock')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        
        <button type="submit">Simpan Buku</button>
    </form>
    
    <br>
    <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
</body>
</html>