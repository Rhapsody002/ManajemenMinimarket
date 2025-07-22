<?php
require_once 'Models/TransaksiModelAdmin.php';

class TransaksiControllerAdmin {
    public function index() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $model = new TransaksiModelAdmin();

        // Update status jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
            $model->updateStatus($_POST['id'], $_POST['status']);
            $_SESSION['pesan'] = "Status transaksi berhasil diperbarui!";
            header("Location: index.php?page=transaksi_admin");
            exit;
        }

        $transaksi = $model->getAllTransaksi();
        include 'Views/Admin/TransaksiAdmin.PHP';
    }
}
