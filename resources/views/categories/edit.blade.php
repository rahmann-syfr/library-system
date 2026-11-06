<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
</head>
<body>
    <h2>Form Edit Kategori</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>
            <label>Nama Kategori:</label><br>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <br><span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </p>
        
        <button type="submit">Update Kategori</button>
    </form>
    
    <br>
    <a href="{{ route('categories.index') }}">Kembali ke Daftar Kategori</a>
</body>
</html>