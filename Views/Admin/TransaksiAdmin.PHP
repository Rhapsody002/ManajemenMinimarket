<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Transaksi Pelanggan</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/AboutUs.CSS">
  <link rel="stylesheet" href="CSS/TransaksiA.CSS">
</head>
<body>
<header>
  <div class="navbar">
    <div class="logo">ADMIN BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_admin">Home</a>
      <a href="index.php?page=produk_admin">Produk</a>
      <a href="index.php?page=transaksi_admin" class="active">Transaksi</a>
      <a href="index.php?page=feedback">Feedback</a>
      <a href="index.php?page=profil_admin">Profil</a>
    </nav>
  </div>
</header>

<section class="content-section">
  <h2>Histori Transaksi Pelanggan</h2>

  <?php if (isset($_SESSION['pesan'])): ?>
    <div style="background:#e0f7fa;padding:10px;text-align:center;color:#00796b;">
        <?= $_SESSION['pesan']; unset($_SESSION['pesan']); ?>
    </div>
  <?php endif; ?>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Tanggal</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Ubah Status</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($transaksi && $transaksi->num_rows > 0): ?>
        <?php $no=1; while($row = $transaksi->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nama_pelanggan'] ?></td>
          <td><?= $row['tanggal'] ?></td>
          <td><?= $row['nama_produk'] ?></td>
          <td><?= $row['jumlah'] ?></td>
          <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
          <td><?= $row['status'] ?></td>
          <td>
            <?php if ($row['bukti_pembayaran']): ?>
              <a href="upload/BuktiPembayaran/<?= $row['bukti_pembayaran'] ?>" target="_blank">
                <img src="upload/BuktiPembayaran/<?= $row['bukti_pembayaran'] ?>" alt="Bukti" style="height:50px;">
              </a>
            <?php else: ?>
              <span style="color:gray;">Belum Ada</span>
            <?php endif; ?>
          </td>
          <td>
            <form method="POST">
              <input type="hidden" name="id" value="<?= $row['id_transaksi'] ?>">
              <select name="status" onchange="this.form.submit()">
                <option <?= $row['status'] == 'Dalam Proses' ? 'selected' : '' ?>>Dalam Proses</option>
                <option <?= $row['status'] == 'Proses Selesai' ? 'selected' : '' ?>>Proses Selesai</option>
              </select>
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="9" style="text-align:center;">Tidak Ada Transaksi.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</section>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
