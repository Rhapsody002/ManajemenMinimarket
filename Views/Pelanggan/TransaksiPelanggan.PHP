<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Histori Pembelian</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/TransaksiP.CSS">
</head>
<body>
<header>
  <div class="navbar">
    <div class="logo">BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_pelanggan">Home</a>
      <a href="index.php?page=produk_pelanggan">Produk</a>
      <a href="index.php?page=transaksi_pelanggan" class="active">Transaksi</a>
      <a href="index.php?page=about_pelanggan">About Us</a>
      <a href="index.php?page=profil_pelanggan">Profil</a>
    </nav>
  </div>
</header>

<h2>Histori Pembelian</h2>

<table>
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Tanggal</th>
      <th>Produk</th>
      <th>Jumlah</th>
      <th>Subtotal</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= $row['id_transaksi'] ?></td>
      <td><?= $row['tanggal'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['jumlah'] ?></td>
      <td>Rp <?= number_format($row['subtotal'], 0, ',', '.') ?></td>
      <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
      <td class="<?= $row['status'] == 'Dalam Proses' ? 'status-pending' : 'status-diterima' ?>">
        <?= $row['status'] ?>
        <?php if ($row['status'] == 'Dalam Proses'): ?>
          <br><a href="index.php?page=bayar&id_transaksi=<?= $row['id_transaksi'] ?>" class="btn-bayar">Bayar</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
