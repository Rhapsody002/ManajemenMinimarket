<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bayar Transaksi</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/Pembayaran.CSS">
</head>
<body>

<div class="content-section">
  <h2>Form Pembayaran</h2>
  <p><strong>Transaksi No:</strong> <?= $data['id_transaksi'] ?></p>
  <p><strong>Produk:</strong> <?= $data['nama'] ?> 
  <p><strong>Jumlah:</strong> <?= $data['jumlah'] ?></p>
  <p><strong>No.Rekening:</strong> 86981075183</p>
  <p><strong>Qris: </strong><br>
  <img src="upload/Betamart.png" alt="" width="100px" height="100px"></p>
  <p><strong>Total:</strong> Rp <?= number_format($data['total'], 0, ',', '.') ?></p>

  <form method="POST" enctype="multipart/form-data" action="index.php?page=upload_pembayaran">
  <input type="hidden" name="id_transaksi" value="<?= $data['id_transaksi'] ?>">

  <label for="bukti">Unggah Bukti Pembayaran (JPG/PNG):</label><br>
  <input type="file" name="bukti" accept="image/*" required><br><br>

  <button type="submit" class="button">Kirim Pembayaran</button>
</form>

</div>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
