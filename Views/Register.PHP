<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - BETAMARKET</title>
  <link rel="stylesheet" href="CSS/Login.CSS" />
</head>
<body>
  <header>
    <div class="navbar">
      <div class="logo">BETAMARKET</div>
      <nav>
        <a href="index.php?page=home">Home</a>
        <a href="index.php?page=produk">Produk</a>
        <a href="index.php?page=about">About Us</a>
        <a href="index.php?page=login" class="active">Login</a>
      </nav>
    </div>
  </header>

  <section class="form-container">
    <h2>Daftar Akun Baru</h2>

    <?php if (!empty($error)) : ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=register">
      <label for="nama">Nama:</label>
      <input type="text" name="nama" required>

      <label for="phone">Nomor HP:</label>
      <input type="text" name="phone" required>

      <label for="alamat">Alamat:</label>
      <input type="text" name="alamat" required>

      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" name="password" required>

      <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="index.php?page=login">Login di sini</a></p>
  </section>

  <footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
