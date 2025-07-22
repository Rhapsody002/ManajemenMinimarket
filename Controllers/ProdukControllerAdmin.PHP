<?php
require_once 'Models/ProdukModelAdmin.PHP';

class ProdukControllerAdmin {
    public function indexAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $model = new ProdukModelAdmin();
        $filter = $_GET['kategori'] ?? '';
        $kategori = $model->getAllKategori();
        $produk = $model->getProdukFiltered($filter);

        include 'Views/Admin/ProdukAdmin.PHP';
    }

    public function tambah() {
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }

    $model = new ProdukModelAdmin();
    $kategori = $model->getAllKategori();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $id_kategori = $_POST['id_kategori'];

        $gambar = null;
        if (!empty($_FILES['gambar']['name'])) {
            $gambar = time() . "_" . basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'upload/' . $gambar);
        }

        $model->tambahProduk($nama, $harga, $stok, $id_kategori, $gambar);
        $_SESSION['pesan'] = "Produk berhasil ditambahkan!";
        header("Location: index.php?page=produk_admin");
        exit;
    }

    include 'Views/Admin/ProdukTambah.PHP';
}


    public function edit() {
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }

    $id = $_GET['id'] ?? null;
    if (!$id || !is_numeric($id)) {
        echo "<p style='color:red;text-align:center;'>ID produk tidak valid.</p>";
        exit;
    }

    $model = new ProdukModelAdmin();
    $data = $model->getProdukById($id);
    $kategori = $model->getAllKategori();

    if (!$data) {
        echo "<p style='color:red;text-align:center;'>Produk tidak ditemukan.</p>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $id_kategori = $_POST['id_kategori'] ?? null;
        $gambar_lama = $_POST['gambar_lama'];

        $gambar = $gambar_lama;
        if (!empty($_FILES['gambar']['name'])) {
            $gambar = time() . "_" . basename($_FILES['gambar']['name']);
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'upload/' . $gambar);
        }

        $model->updateProduk($id, $nama, $harga, $stok, $id_kategori, $gambar);
        $_SESSION['pesan'] = "Produk berhasil diperbarui!";
        header("Location: index.php?page=produk_admin");
        exit;
    }

    include 'Views/Admin/ProdukEdit.PHP';
}


    public function hapus() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_GET['id'];
        $model = new ProdukModelAdmin();
        $model->hapusProduk($id);
        $_SESSION['pesan'] = "Produk berhasil dihapus!";
        header("Location: index.php?page=produk_admin");
        exit;
    }
}
