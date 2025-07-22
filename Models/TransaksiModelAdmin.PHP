<?php
require_once 'Core/Database.php';

class TransaksiModelAdmin {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function getAllTransaksi() {
        $sql = "
            SELECT t.id_transaksi, t.tanggal, t.total, t.status, t.bukti_pembayaran,
                   p.nama AS nama_produk, dt.jumlah, dt.subtotal,
                   pl.nama AS nama_pelanggan
            FROM transaksi t
            JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
            JOIN produk p ON dt.id_produk = p.id_produk
            JOIN pelanggan pl ON t.id_pelanggan = pl.id_pelanggan
            ORDER BY t.tanggal DESC
        ";
        return $this->conn->query($sql);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE transaksi SET status = ? WHERE id_transaksi = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }
}
