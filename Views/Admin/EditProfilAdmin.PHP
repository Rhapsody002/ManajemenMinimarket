<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profil Admin</title>
  <link rel="stylesheet" href="CSS/Style.CSS">
  <link rel="stylesheet" href="CSS/Profil.CSS">
</head>
<body>

<div class="form-box">
  <h2>Edit Profil Admin</h2>
  <form method="POST" enctype="multipart/form-data">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

    <label>Foto Baru (Opsional)</label>
    <input type="file" name="foto" accept="image/*">

    <input type="submit" value="Simpan Perubahan">
  </form>
</div>
<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
