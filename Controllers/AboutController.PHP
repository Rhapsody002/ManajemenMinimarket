<?php
require_once 'Models/FeedbackModel.PHP';

class AboutController {
    private $model;

    public function __construct() {
        $this->model = new FeedbackModel();
    }

    public function index() {
        $success = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];

            if ($this->model->simpanFeedback($nama, $email, $pesan)) {
                $success = "Terima kasih atas masukan Anda!";
            } else {
                $success = "Terjadi kesalahan, coba lagi.";
            }
        }

        include 'Views/AboutUs.PHP';
    }

    public function pelanggan() {
        $success = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];

            if ($this->model->simpanFeedback($nama, $email, $pesan)) {
                $success = "Terima kasih atas masukan Anda!";
            } else {
                $success = "Terjadi kesalahan, coba lagi.";
            }
        }

        include 'Views/Pelanggan/AboutUsPelanggan.PHP';
    }
}
