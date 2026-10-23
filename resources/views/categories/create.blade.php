<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>
    <h2>Form Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <p>
            <label>Nama Kategori:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        
        <button type="submit">Simpan Kategori</button>
    </form>
    
    <br>
    <a href="{{ route('categories.index') }}">Kembali ke Daftar Kategori</a>
</body>
</html>