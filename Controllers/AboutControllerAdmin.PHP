<?php
require_once 'Models/FeedbackModel.PHP';

class AboutControllerAdmin {
    public function index() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $model = new FeedbackModel();

        // Hapus jika ada permintaan
        if (isset($_GET['hapus'])) {
            $id = intval($_GET['hapus']);
            $model->hapusFeedback($id);
            $_SESSION['pesan'] = "Pesan berhasil dihapus.";
            header("Location: index.php?page=feedback");
            exit;
        }

        $feedback = $model->getAllFeedback();
        include 'Views/Admin/FeedBack.PHP';
    }
}
