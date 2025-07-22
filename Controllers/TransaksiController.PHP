<?php
require_once 'Models/TransaksiModel.PHP';

class TransaksiController {
    private $model;

    public function __construct() {
        $this->model = new TransaksiModel();
    }

    public function indexPelanggan() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['pelanggan'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id_pelanggan = $_SESSION['pelanggan']['id'];
        $result = $this->model->getByPelanggan($id_pelanggan);

        include 'Views/Pelanggan/TransaksiPelanggan.PHP';
    }

    public function bayar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['pelanggan'])) {
            header("Location: index.php?page=login");
            exit;
        }

        if (!isset($_GET['id_transaksi'])) {
            echo "<p style='color:red'>ID transaksi tidak ditemukan.</p>";
            exit;
        }

        $id_transaksi = (int)$_GET['id_transaksi'];
        $data = $this->model->getDetailTransaksi($id_transaksi);

        if (!$data) {
            echo "<p style='color:red'>Data transaksi tidak ditemukan.</p>";
            exit;
        }

        include 'Views/Pelanggan/FormPembayaran.PHP';
    }

    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id_transaksi'];
            $uploadDir = "upload/BuktiPembayaran/";

            // Buat folder jika belum ada
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Validasi file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            $maxSize = 2 * 1024 * 1024; // 2MB

            $file = $_FILES['bukti'];
            $fileType = $file['type'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $tmpName = $file['tmp_name'];

            if ($fileError === 0) {
                if (!in_array($fileType, $allowedTypes)) {
                    echo "<script>alert('Hanya file JPG atau PNG yang diperbolehkan!'); history.back();</script>";
                    return;
                }

                if ($fileSize > $maxSize) {
                    echo "<script>alert('Ukuran file terlalu besar. Maksimal 2MB.'); history.back();</script>";
                    return;
                }

                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $fileName = 'bukti_' . $id . '_' . time() . '.' . $ext;
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $targetPath)) {
                    // Simpan ke database via model
                    $this->model->simpanBuktiPembayaran($id, $fileName);
                    echo "<script>alert('Pembayaran berhasil dikirim!'); window.location.href='index.php?page=home_pelanggan';</script>";
                } else {
                    echo "<script>alert('Gagal menyimpan file.'); history.back();</script>";
                }
            } else {
                echo "<script>alert('Upload gagal!'); history.back();</script>";
            }
        }
    }
}
