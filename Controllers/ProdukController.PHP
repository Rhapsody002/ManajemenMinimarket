<?php
require_once 'Models/ProdukModel.PHP';

class ProdukController {
    
    public function index() {
    $model = new ProdukModel();
    $filter = $_GET['kategori'] ?? '';
    $search = $_GET['search'] ?? '';
    $kategori = $model -> getKategori ();
    $produk = $model->getProdukFiltered ($filter, $search);
    include 'Views/Produk.PHP';
}
    public function indexPelanggan() {
    $model = new ProdukModel();
    $filter = $_GET['kategori'] ?? '';
    $search = $_GET['search'] ?? '';
    $kategori = $model -> getKategori ();
    $produk = $model->getProdukFiltered ($filter, $search);
    include 'Views/Pelanggan/ProdukPelanggan.PHP';
}
    public function beli() {
    if (!isset($_SESSION['pelanggan'])) {
        header("Location: index.php?page=login");
        exit;
    }

    if (!isset($_GET['id'])) {
        header("Location: index.php?page=produk_pelanggan");
        exit;
    }

    $id = $_GET['id'];
    $model = new ProdukModel();
    $produk = $model->getProdukById($id);

    if (!$produk) {
        echo "Produk tidak ditemukan.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jumlah = intval($_POST['jumlah']);
        $subtotal = $produk['harga'] * $jumlah;
        $sisa_stok = $produk['stok'] - $jumlah;
        $pelanggan_id = $_SESSION['pelanggan']['id'];

        $model->simpanTransaksi($pelanggan_id, $id, 
        $jumlah, $subtotal, $sisa_stok);

        $_SESSION['message'] = "Transaksi berhasil!";
        header("Location: index.php?page=produk_pelanggan");
        exit;
    }

    include 'Views/Pelanggan/PembelianPelanggan.php';
}
}
?>