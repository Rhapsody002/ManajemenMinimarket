<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Produk Pelanggan</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/Produk.CSS">
  <link rel="stylesheet" href="CSS/ProdukU.CSS">
</head>
<body>
  <header>
    <div class="navbar">
      <div class="logo">BETAMARKET</div>
      <nav>
        <a href="index.php?page=home">Home</a>
        <a href="index.php?page=produk" class="active">Produk</a>
        <a href="index.php?page=about">About Us</a>
        <a href="index.php?page=login">Login</a>
      </nav>
    </div>
  </header>

  <section class="produk-unggulan">
    <h2 style="text-align:center;">Daftar Produk</h2>

    <!-- Filter dan Search -->
    <form method="GET" class="filter-search-bar">
      <input type="hidden" name="page" value="produk">
      <div class="filter-search-container">
        <select name="kategori" onchange="this.form.submit()" class="filter-select">
          <option value="">Semua Kategori</option>
          <?php foreach ($kategori as $kat): ?>
            <option value="<?= $kat['id_kategori'] ?>" <?= ($filter == $kat['id_kategori']) ? 'selected' : '' ?>>
              <?= $kat['nama_kategori'] ?>
            </option>
          <?php endforeach; ?>
        </select>

        <input type="text" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($search) ?>" class="search-input" />
        <button type="submit" class="search-button">🔍 Cari</button>
      </div>
    </form>

    <!-- Daftar Produk -->
    <div class="produk-grid">
      <?php if (!empty($produk)): ?>
        <?php foreach ($produk as $row): ?>
          <div class="produk-item">
            <img src="upload/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>">
            <h3><?= $row['nama'] ?></h3>
            <p>Stok: <?= $row['stok'] ?></p>
            <p>Kategori: <?= $row['nama_kategori'] ?></p>
            <p>Harga: Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
            <a href="index.php?page=login" class="button">Beli</a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center; width:100%;">Produk tidak ditemukan.</p>
      <?php endif; ?>
    </div>
  </section>
  <footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
