<!-- Views/Admin/ProdukEdit.PHP -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Admin</title>
    <link rel="stylesheet" href="CSS/Style.CSS">
    <link rel="stylesheet" href="CSS/Produk.CSS">
</head>
<body>

<header>
  <div class="navbar">
    <div class="logo">Admin BETAMARKET</div>
    <nav>
      <a href="index.php?page=produk_admin">← Kembali ke Produk</a>
    </nav>
  </div>
</header>

<section class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <h2>Edit Produk</h2>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" value="<?= $data['harga'] ?>" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" value="<?= $data['stok'] ?>" required>
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" required>
                <?php foreach ($kategori as $kat): ?>
                    <option value="<?= $kat['id_kategori'] ?>" <?= ($kat['id_kategori'] == $data['id_kategori']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($kat['nama_kategori']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar Produk (kosongkan jika tidak diubah)</label>
            <input type="file" name="foto" accept="image/*">
            <br><small>Gambar sekarang:</small><br>
            <img src="upload/<?= $data['gambar'] ?>" width="120" alt="gambar lama">
            <input type="hidden" name="gambar_lama" value="<?= $data['gambar'] ?>">
        </div>
        
        <div class="form-actions">
            <input type="submit" value="Update Produk">
        </div>
    </form>
</section>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
