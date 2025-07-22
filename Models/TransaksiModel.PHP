<?php
require_once 'Core/Database.php';

class TransaksiModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db-> getConnection();
    }

    public function getByPelanggan($id_pelanggan) {
        $stmt = $this->conn->prepare("
            SELECT t.id_transaksi, t.tanggal, t.total, t.status, p.nama, dt.jumlah, dt.subtotal
            FROM transaksi t
            JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
            JOIN produk p ON dt.id_produk = p.id_produk
            WHERE t.id_pelanggan = ?
            ORDER BY t.tanggal DESC
        ");
        $stmt->bind_param("i", $id_pelanggan);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getDetailTransaksi($id_transaksi) {
        $stmt = $this->conn->prepare("
            SELECT t.*, d.jumlah, d.subtotal, p.nama 
            FROM transaksi t
            JOIN detail_transaksi d ON t.id_transaksi = d.id_transaksi
            JOIN produk p ON d.id_produk = p.id_produk
            WHERE t.id_transaksi = ?
        ");
        $stmt->bind_param("i", $id_transaksi);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function simpanBuktiPembayaran($id_transaksi, $fileName) {
        $sql = "UPDATE transaksi SET bukti_pembayaran = '$fileName' WHERE id_transaksi = $id_transaksi";
        return $this-> conn ->query($sql);
}

}
