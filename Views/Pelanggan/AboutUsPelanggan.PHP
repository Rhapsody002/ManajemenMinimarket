<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - BETAMARKET</title>
    <link rel="stylesheet" href="CSS/Style.CSS">
</head>
<body>
<header>
    <div class="navbar">
        <div class="logo">BETAMARKET</div>
        <nav>
            <a href="index.php?page=home_pelanggan">Home</a>
            <a href="index.php?page=produk_pelanggan">Produk</a>
            <a href="index.php?page=transaksi_pelanggan">Transaksi</a>
            <a href="index.php?page=about_pelanggan" class="active">About Us</a>
            <a href="index.php?page=profil_pelanggan">Profil</a>
        </nav>
    </div>
</header>

<section class="tentang-perusahaan">
    <h2>Tentang BETAMARKET</h2>
    <p>BETAMARKET adalah platform minimarket online yang menyediakan berbagai kebutuhan sehari-hari pelanggan, mulai dari makanan, minuman, bahan pokok, hingga obat-obatan.</p>
    <p>Kami berkomitmen memberikan pengalaman belanja yang mudah, aman, dan cepat untuk semua pelanggan kami.</p>
</section>

<section class="content-section">
    <center><h2>Kritik, Saran, atau Masukan Anda</h2></center>
    <?php if ($success): ?>
        <p style="color: green; font-weight: bold; text-align: center;"><?= $success ?></p>
    <?php endif; ?>
    <form action="index.php?page=about_pelanggan" method="POST" style="max-width:600px; margin:auto;">
        <label for="nama">Nama Anda:</label>
        <input type="text" id="nama" name="nama" required style="width:100%; padding:8px; margin-bottom:10px;">

        <label for="email">Email Anda:</label>
        <input type="email" id="email" name="email" required style="width:100%; padding:8px; margin-bottom:10px;">

        <label for="pesan">Pesan / Keluhan:</label>
        <textarea id="pesan" name="pesan" rows="5" required style="width:100%; padding:8px; margin-bottom:10px;"></textarea>

        <button type="submit" class="button-kedua">Kirim Masukan</button>
    </form>
</section>

<footer>
    <p>&copy; 2025 BETAMARKET. Dibuat oleh kelompok 6.</p>
</footer>
</body>
</html>
