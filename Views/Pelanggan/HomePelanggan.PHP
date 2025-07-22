<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_SESSION['welcome'])) {
    echo "<script>alert('" . $_SESSION['welcome'] . "');</script>";
    unset($_SESSION['welcome']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - BETAMARKET</title>
  <link rel="stylesheet" href="CSS/Style.CSS" />
</head>
<body>
  <header>
  <div class="navbar">
    <div class="logo">BETAMARKET</div>
    <nav>
      <a href="index.php?page=home_pelanggan" class="active">Home</a>
      <a href="index.php?page=produk_pelanggan">Produk</a>
      <a href="index.php?page=transaksi_pelanggan">Transaksi</a>
      <a href="index.php?page=about_pelanggan">About Us</a>
      <a href="index.php?page=profil_pelanggan">Profil</a>
    </nav>
  </div>
</header>

  <section class="text">
    <h1>Belanja Mudah, Harga Hemat</h1>
    <p>Temukan kebutuhan harian dengan harga terbaik di minimarket kami</p>
    <a href="index.php?page=produk_pelanggan" class="button">Lihat Produk</a>
  </section>

   <section class="produk-unggulan">
    <h2>Produk Unggulan Makanan</h2>
    <div class="produk-grid">
    
      <div class="produk-item">
      <img src="upload/1752721471_rm-orange-scaled.jpg" alt="Beras Batu Mutiara" style="width: 100%; height: auto;">
      <h3>Beras Batu Mutiara</h3>
      <p>Harga: Rp 40.000</p>
      <a href="index.php?page=login" class="button">Beli</a>
    </div>

    <div class="produk-item">
      <img src="upload/1752721842_chitatosapipanggang68grnewhalal_751a83ca-f8c3-4b27-be80-2fd12d2f309d_900x900.jpg" alt="Chitato" style="width: 100%; height: auto;">
      <h3>Chitato</h3>
      <p>Harga: Rp 13.000</p>
      <a href="index.php?page=login" class="button">Beli</a>
    </div>

    <div class="produk-item">
      <img src="upload/1752721397_335ade3e-c81f-4276-be5d-60eb5a39d467.jpg" alt="Roico" style="width: 100%; height: auto;">
      <h3>Roico</h3>
      <p>Harga: Rp 1.000</p>
      <a href="index.php?page=login" class="button">Beli</a>
    </div>

    </div>
  </section>

  <section class="produk-unggulan">
  <h2>Produk Unggulan Minuman</h2>
  <div class="produk-grid">
    
    <div class="produk-item">
      <img src="upload/1752721321_SwissChoco225ml_d0e66376-0904-4db0-9bc1-2f430fb1ba0a_900x900.png" alt="Susu Frisian Flag" style="width: 100%; height: auto;">
      <h3>Susu Frisian Flag</h3>
      <p>Harga: Rp 7.000</p>
      <a href="index.php?page=login" class="button">Beli</a>
    </div>

    <div class="produk-item">
      <img src="upload/1751467208_download.jpeg" alt="Ado" style="width: 100%; height: auto;">
      <h3>Ado</h3>
      <p>Harga: Rp 150.000</p>
      <a href="index.php?page=login" class="button">Beli</a>
    </div>

    <div class="produk-item">
      <img src="upload/1750817662_Milo.jpg" alt="Milo" style="width: 100%; height: auto;">
      <h3>Milo</h3>
      <p>Harga: Rp 11.000</p>
      <a href="index.php?page=login" class="button">Beli</a>
    </div>

  </div>
</section>

  <section class="tentang-perusahaan">
    <h2>Tentang BETAMARKET</h2>
    <p>BETAMARKET adalah destinasi belanja online terpercaya Anda untuk kebutuhan sehari-hari. Kami berkomitmen untuk menyediakan produk berkualitas tinggi dengan harga yang kompetitif, serta pengalaman berbelanja yang mudah dan menyenangkan.</p>
    <p>Didirikan dengan visi untuk mempermudah akses masyarakat terhadap barang kebutuhan pokok, BETAMARKET terus berinovasi untuk memberikan pelayanan terbaik bagi pelanggan kami.</p>
    <a href="index.php?page=about_pelanggan" class="button-kedua">Pelajari Lebih Lanjut</a>
  </section>

  <footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
