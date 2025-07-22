<?php
session_start();

require_once 'Controllers/HomeController.PHP';
require_once 'Controllers/ProdukController.PHP';
require_once 'Controllers/LRController.PHP';
require_once 'Controllers/AboutController.PHP';
require_once 'Controllers/TransaksiController.PHP';
require_once 'Controllers/TransaksiControllerAdmin.PHP';
require_once 'Controllers/ProdukControllerAdmin.PHP'; 
require_once 'Controllers/AboutControllerAdmin.PHP'; 


$page = $_GET['page'] ?? 'home';

$controller = new LRController();

switch ($page) {
    // ===================== UMUM =====================
    case 'home':
        $home = new HomeController();
        $home->index();
        break;
    
    case 'produk':
        $produk = new ProdukController();
        $produk->index();
        break;

    case 'login':
        $auth = new LRController();
        $auth->login();
        break;

    case 'register':
        $auth = new LRController();
        $auth->register();
        break;

    case 'logout':
        $auth = new LRController();
        $auth->logout();
        break;

    case 'about':
        $controller = new AboutController();
        $controller->index();
        break;

    // ===================== PELANGGAN =====================
    case 'home_pelanggan':
        $home = new HomeController();
        $home->index2();
        break;

    case 'produk_pelanggan':
        $produk = new ProdukController();
        $produk->indexPelanggan();
        break;

    case 'transaksi_pelanggan':
        $transaksi = new TransaksiController();
        $transaksi->indexPelanggan();
        break;

    case 'pembelian':
        $produk = new ProdukController();
        $produk->beli();
        break;

    case 'bayar':
        $transaksi = new TransaksiController();
        $transaksi->bayar();
        break;

    case 'upload_pembayaran':
        $transaksi = new TransaksiController();
        $transaksi->upload();
        break;

    case 'profil_pelanggan':
        $controller = new LRController();
        $controller->profil();
        break;

    case 'edit_profil':
        $controller = new LRController();
        $controller->editProfil();
        break;

    case 'about_pelanggan':
        $controller = new AboutController();
        $controller->pelanggan();
        break;

    // ===================== ADMIN =====================
    case 'home_admin':
        $home = new HomeController();
        $home->index3();
        break;

    case 'produk_admin':
        $controller = new ProdukControllerAdmin();
        $controller->indexAdmin();
        break;

    case 'tambah_produk':
        $controller = new ProdukControllerAdmin();
        $controller->tambah();
        break;

    case 'edit_produk':
        $controller = new ProdukControllerAdmin();
        $controller->edit();
        break;

    case 'hapus_produk':
        $controller = new ProdukControllerAdmin();
        $controller->hapus();
        break;
    
    case 'transaksi_admin':
        $controller = new TransaksiControllerAdmin();
        $controller->index();
    break;

    case 'feedback':
        (new AboutControllerAdmin())-> index ();
        break;

    case 'profil_admin':
        $controller = new LRController();
        $controller->profilAdmin();
        break;

    case 'edit_profil_admin':
        $controller = new LRController();
        $controller->editProfilAdmin();
        break;


    // ===================== DEFAULT =====================
    default:
        echo "<h1>404 - Halaman tidak ditemukan</h1>";
        break;
}
?>
