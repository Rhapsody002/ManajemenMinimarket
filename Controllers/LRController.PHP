<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'Models/UserModel.PHP';

class LRController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // ======================== LOGIN ========================
    public function login() {
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Cek Pelanggan
            $user = $this->model->login($email, $password);
            if ($user) {
                $_SESSION['pelanggan'] = [
                    'id' => $user['id_pelanggan'],
                    'nama' => $user['nama']
                ];
                $_SESSION['welcome'] = "Selamat datang, " . $user['nama'] . "!";
                header("Location: index.php?page=home_pelanggan");
                exit;
            }

            // Cek Admin
            $admin = $this->model->loginAdmin($email, $password);
            if ($admin) {
                $_SESSION['admin'] = [
                    'id' => $admin['id_admin'],
                    'nama' => $admin['nama']
                ];
                $_SESSION['welcome'] = "Selamat datang Admin " . $admin['nama'] . "!";
                header("Location: index.php?page=home_admin");
                exit;
            }

            $error = "Email atau password salah.";
        }

        include 'Views/Login.PHP';
    }

    // ======================== REGISTER ========================
    public function register() {
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->model->register(
                $_POST['nama'],
                $_POST['phone'],
                $_POST['alamat'],
                $_POST['email'],
                $_POST['password']
            );
            if ($result) {
                header("Location: index.php?page=login");
                exit;
            } else {
                $error = "Gagal mendaftar.";
            }
        }
        include 'Views/Register.PHP';
    }

    // ======================== PROFIL PELANGGAN ========================
    public function profil() {
        if (!isset($_SESSION['pelanggan'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id_pelanggan = $_SESSION['pelanggan']['id'];
        $data = $this->model->getPelangganById($id_pelanggan);

        if (!$data) {
            echo "<p style='color:red;text-align:center;'>Data pelanggan tidak ditemukan.</p>";
            exit;
        }

        include 'Views/Pelanggan/ProfilPelanggan.PHP';
    }

    public function editProfil() {
        if (!isset($_SESSION['pelanggan'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_SESSION['pelanggan']['id'];
        $data = $this->model->getPelangganById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $phone = $_POST['phone'];
            $foto = null;

            if (!empty($_FILES['foto']['name'])) {
                $foto = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];
                $uploadPath = "upload/" . $foto;
                move_uploaded_file($tmp, $uploadPath);
            }

            $this->model->updatePelanggan($id, $nama, $alamat, $phone, $foto);
            $_SESSION['pelanggan']['nama'] = $nama;

            echo "<script>alert('Profil berhasil diperbarui.'); window.location='index.php?page=profil_pelanggan';</script>";
            return;
        }

        include 'Views/Pelanggan/EditProfil.PHP';
    }

    // ======================== PROFIL ADMIN ========================
    public function profilAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id_admin = $_SESSION['admin']['id'];
        $data = $this->model->getAdminById($id_admin);

        include 'Views/Admin/ProfilAdmin.PHP';
    }

    public function editProfilAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = $_SESSION['admin']['id'];
        $data = $this->model->getAdminById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $foto = null;

            if (!empty($_FILES['foto']['name'])) {
                $foto = $_FILES['foto']['name'];
                $tmp = $_FILES['foto']['tmp_name'];
                $uploadPath = "upload/" . $foto;
                move_uploaded_file($tmp, $uploadPath);
            }

            $this->model->updateAdmin($id, $nama, $email, $foto);
            $_SESSION['admin']['nama'] = $nama;

            echo "<script>alert('Profil berhasil diperbarui.'); window.location='index.php?page=profil_admin';</script>";
            return;
        }

        include 'Views/Admin/EditProfilAdmin.PHP';
    }

    // ======================== LOGOUT ========================
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}
