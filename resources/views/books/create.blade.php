<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
</head>
<body>
    <h2>Form Tambah Buku Perpustakaan</h2>

    <!-- Form mengirim data menggunakan metode POST ke URL /books -->
    <form action="/books" method="POST">
        @csrf <!-- Token keamanan wajib di Laravel untuk form POST -->
        
        <p>
            <label>Judul Buku:</label><br>
            <input type="text" name="title" required>
        </p>
        <p>
            <label>Penulis:</label><br>
            <input type="text" name="author" required>
        </p>
        <p>
            <label>Tahun Terbit:</label><br>
            <input type="number" name="year" required>
        </p>
        <p>
            <label>Stok:</label><br>
            <input type="number" name="stock" required>
        </p>
        
        <button type="submit">Simpan Buku</button>
    </form>
    
    <br>
    <a href="/books">Kembali ke Daftar Buku</a>
</body>
</html>