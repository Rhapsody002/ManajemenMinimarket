<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Produk - Admin</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/Produk.CSS">
  <link rel="stylesheet" href="CSS/ProdukU.CSS">

</head>
<body>
<header>
  <div class="navbar">
    <div class="logo">ADMIN BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_admin">Home</a>
      <a href="index.php?page=produk_admin" class="active">Produk</a>
      <a href="index.php?page=transaksi_admin">Transaksi</a>
      <a href="index.php?page=feedback">FeedBack</a>
      <a href="index.php?page=profil_admin">Profil</a>
    </nav>
  </div>
</header>

<section class="produk-unggulan">
  <h2 style="text-align:center;">Kelola Produk</h2>

  <?php if (isset($_SESSION['pesan'])): ?>
    <div style="background-color: #e0f7fa; color: #00796b; padding: 10px; margin-bottom: 15px; text-align:center;">
      <?= $_SESSION['pesan']; unset($_SESSION['pesan']); ?>
    </div>
  <?php endif; ?>

  <!-- Filter dan Tambah -->
  <form method="GET" class="filter-search-bar">
    <input type="hidden" name="page" value="produk_admin">
    <div class="filter-search-container">
      <select name="kategori" onchange="this.form.submit()" class="filter-select">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategori as $kat): ?>
          <option value="<?= $kat['id_kategori'] ?>" <?= ($filter == $kat['id_kategori']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($kat['nama_kategori']) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <a href="index.php?page=tambah_produk" class="button-kedua">+ Tambah Produk</a>
    </div>
  </form>

  <div class="produk-grid">
    <?php if ($produk && $produk->num_rows > 0): ?>
      <?php while ($row = $produk->fetch_assoc()): ?>
        <?php $gambar = !empty($row['foto']) ? $row['foto'] : 'default.png'; ?>
        <div class="produk-item <?= ($row['stok'] < 5) ? 'stok-tipis' : '' ?>">
        <img src="upload/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>" style="width:100%; max-height:200px; object-fit:cover;">
        <h3><?= htmlspecialchars($row['nama']) ?></h3>
        <p class="stok">Stok: <?= $row['stok'] ?> pcs</p>
        <p>Harga: Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
        <p><small>Kategori: <?= htmlspecialchars($row['nama_kategori']) ?></small></p>
        <div class="action-buttons">
        <a href="index.php?page=edit_produk&id=<?= $row['id_produk'] ?>" class="button">Edit</a>
        <a href="index.php?page=hapus_produk&id=<?= $row['id_produk'] ?>" class="button" 
        onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
        </div>
    </div>
      <?php endwhile; ?>
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
