<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masukan Pelanggan - Admin</title>
    <link rel="stylesheet" href="CSS/Style.CSS">
    <link rel="stylesheet" href="CSS/AboutUs.CSS">
</head>
<body>
<header>
  <div class="navbar">
    <div class="logo">ADMIN BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_admin">Home</a>
      <a href="index.php?page=produk_admin">Produk</a>
      <a href="index.php?page=transaksi_admin">Transaksi</a>
      <a href="index.php?page=feedback" class="active">FeedBack</a>
      <a href="index.php?page=profil_admin">Profil</a>
    </nav>
  </div>
</header>

<section class="content-section">
    <h2>Daftar Masukan Pelanggan</h2>

    <?php if (isset($_SESSION['pesan'])): ?>
        <div style="background:#e0f7fa;padding:10px;text-align:center;color:#00796b;">
            <?= $_SESSION['pesan']; unset($_SESSION['pesan']); ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($feedback && $feedback->num_rows > 0): ?>
                <?php while($row = $feedback->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['pesan'])) ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td>
                        <a href="index.php?page=feedback&hapus=<?= $row['id_feedback'] ?>" class="btn-delete"
                        onclick="return confirm('Hapus pesan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">Belum Ada Masukan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
</body>
</html>
