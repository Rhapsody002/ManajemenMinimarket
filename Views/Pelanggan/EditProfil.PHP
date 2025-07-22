<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profil</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/EditProfilU.CSS">
</head>
<body>

<div class="profil-container">
  <h2>Edit Profil Saya</h2>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>">
    </div>

    <div class="form-group">
      <label>No. Telepon</label>
      <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>">
    </div>

    <div class="form-group">
      <label>Foto Profil</label>
      <input type="file" name="foto" accept="image/*">
    </div>

    <button type="submit" class="button-profil btn-kuning">Simpan</button>
    <a href="index.php?page=profil_pelanggan" class="button-profil btn-batal">Batal</a>
  </form>
</div>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
