<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/category/addCategory.css">
    <title>Tambah Kategori</title>
</head>
<body>
    <header>
        <h1>Tambah Kategori Baru</h1>
        <nav>
            <a href="kategori.php">Kembali ke Daftar Kategori</a>
        </nav>
    </header>
    
    <main>
        <form action="proses_tambah_kategori.php" method="POST">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" id="nama_kategori" name="nama_kategori" required>
            
            <button type="submit">Tambah Kategori</button>
        </form>
    </main>
</body>
</html>
