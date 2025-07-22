<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BETAMARKET</title>
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
    <h2>Masuk ke Akun Anda</h2>

    <?php if (isset($_SESSION['pelanggan'])) : ?>
      <h3>Anda sudah login sebagai <?= $_SESSION['pelanggan']['nama'] ?>.</h3>
    <?php else: ?>
      <?php if (!empty($error)) : ?>
        <div class="error-message"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" action="index.php?page=login">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
      </form>

      <p>Belum punya akun? <a href="index.php?page=register">Daftar di sini</a></p>
    <?php endif; ?>
  </section>

  <footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
