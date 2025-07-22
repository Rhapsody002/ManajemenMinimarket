<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pelanggan</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/Profil.CSS">
</head>
<body>

<header>
  <div class="navbar">
    <div class="logo">BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_pelanggan">Home</a>
      <a href="index.php?page=produk_pelanggan">Produk</a>
      <a href="index.php?page=transaksi_pelanggan">Transaksi</a>
      <a href="index.php?page=about_pelanggan">About Us</a>
      <a href="index.php?page=profil_pelanggan" class="active">Profil</a>
    </nav>
  </div>
</header>

<?php if (!isset($data) || !$data): ?>
    <p style="color:red;text-align:center;">Data pelanggan tidak ditemukan.</p>
<?php else: ?>
<div class="profile-box">
  <?php if ($data['foto']) : ?>
    <img src="upload/<?= htmlspecialchars($data['foto']) ?>" alt="Foto Profil">
  <?php else : ?>
    <img src="upload/default.png" alt="Default Foto">
  <?php endif; ?>

  <h2><?= htmlspecialchars($data['nama']) ?></h2>
  <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
  <p><strong>Alamat:</strong> <?= htmlspecialchars($data['alamat']) ?></p>
  <p><strong>Telepon:</strong> <?= htmlspecialchars($data['phone']) ?></p>

  <a href="index.php?page=edit_profil" class="button-profil">Edit Profil</a>
  <a href="index.php?page=logout" class="button-profil logout-button">Logout</a>
</div>
<?php endif; ?>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
