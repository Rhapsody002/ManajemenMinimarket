<?php
require_once 'Core/Database.php';

class FeedbackModel {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())-> getConnection ();
    }

    public function simpanFeedback($nama, $email, $pesan) {
        $stmt = $this->conn->prepare("INSERT INTO feedback (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $pesan);
        return $stmt->execute();
    }

    public function getAllFeedback() {
        return $this->conn->query("SELECT * FROM feedback ORDER BY tanggal DESC");
    }
    public function hapusFeedback($id) {
        $stmt = $this->conn->prepare("DELETE FROM feedback WHERE id_feedback = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
}

}

