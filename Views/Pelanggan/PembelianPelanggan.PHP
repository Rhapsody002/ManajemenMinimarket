<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Transaksi Produk</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/Pembelian.CSS">
</head>
<body>
<header>
  <div class="navbar">
    <div class="logo">BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_pelanggan">Home</a>
      <a href="index.php?page=produk_pelanggan" class="active">Produk</a>
      <a href="index.php?page=transaksi_pelanggan">Transaksi</a>
      <a href="index.php?page=about_pelanggan">About Us</a>
      <a href="index.php?page=profil_pelanggan">Profil</a>
    </nav>
  </div>
</header>

<div class="transaksi-container">
  <h2><?= htmlspecialchars($produk ['nama']) ?></h2>
  <p>Harga: Rp <?= number_format($produk ['harga'], 0, ',', '.') ?></p>
  <p>Stok tersedia: <strong><?= $produk ['stok'] ?></strong></p>

  <form method="POST" oninput="updateTotal()">
    <div class="form-group">
      <label for="jumlah">Jumlah Beli</label>
      <input type="number" name="jumlah" id="jumlah" value="1" min="1" max="<?= $produk['stok'] ?>" required>
    </div>

    <div class="total-harga">
      Total: Rp <span id="total"><?= number_format($produk['harga'], 0, ',', '.') ?></span>
    </div>

    <button type="submit" class="button">Beli Sekarang</button>
  </form>
</div>

<script>
  const harga = <?= $produk ['harga'] ?>;
  const jumlahInput = document.getElementById('jumlah');
  const totalSpan = document.getElementById('total');

  function updateTotal() {
    const jumlah = parseInt(jumlahInput.value) || 0;
    const total = jumlah * harga;
    totalSpan.innerText = total.toLocaleString('id-ID');
  }
</script>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
