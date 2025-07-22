<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk - Admin</title>
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
  <form action="" method="POST" enctype="multipart/form-data">
    <h2>Tambah Produk Baru</h2>

    <?php if (!empty($error ?? '')): ?>
      <p style="color: red; text-align: center;"><?= $error ?></p>
    <?php endif; ?>

    <div class="form-group">
      <label for="nama">Nama Produk</label>
      <input type="text" name="nama" required>
    </div>

    <div class="form-group">
      <label for="harga">Harga</label>
      <input type="number" name="harga" required>
    </div>

    <div class="form-group">
      <label for="stok">Stok</label>
      <input type="number" name="stok" required>
    </div>

    <div class="form-group">
      <label for="id_kategori">Kategori</label>
      <select name="id_kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <?php if ($kategori && $kategori->num_rows > 0): ?>
          <?php while ($row = $kategori->fetch_assoc()): ?>
            <option value="<?= $row['id_kategori'] ?>"><?= htmlspecialchars($row['nama_kategori']) ?></option>
          <?php endwhile; ?>
        <?php endif; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="gambar">Gambar Produk</label>
      <input type="file" name="gambar" accept="image/*" required>
    </div>

    <div class="form-actions">
      <input type="submit" value="Simpan Produk">
    </div>
  </form>
</section>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
