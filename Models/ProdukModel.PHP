<?php
require_once 'Core/Database.php';

class ProdukModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getKategori() {
        return $this->db->execute("SELECT * FROM kategori");
    }

    public function getProdukFiltered($kategori = '', $search = '') {
    $sql = "SELECT p.*, k.nama_kategori 
            FROM produk p 
            JOIN kategori k ON p.id_kategori = k.id_kategori 
            WHERE 1";

    if (!empty($kategori)) {
        $kategori = $this->db->getConnection()->real_escape_string($kategori);
        $sql .= " AND p.id_kategori = '$kategori'";
    }

    if (!empty($search)) {
        $search = $this->db->getConnection()->real_escape_string($search);
        $sql .= " AND p.nama LIKE '%$search%'";
    }

    return $this->db->execute($sql);
}

    public function getProdukById($id) {
    $conn = $this->db-> getConnection ();
    $id = $conn->real_escape_string($id);
    $result = $conn->query("SELECT * FROM produk WHERE id_produk = '$id'");
    return $result->fetch_assoc();
}


public function simpanTransaksi($pelanggan_id, $id_produk, $jumlah, $subtotal, $sisa_stok) {
    $conn = $this->db->getConnection();

    // Simpan ke transaksi
    $conn->query("INSERT INTO transaksi (id_pelanggan, total, status, tanggal) VALUES ($pelanggan_id, $subtotal, 'Dalam Proses', NOW())");
    $id_transaksi = $conn->insert_id;

    // Simpan ke detail
    $conn->query("INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, subtotal) VALUES ($id_transaksi, $id_produk, $jumlah, $subtotal)");

    // Update stok produk
    $conn->query("UPDATE produk SET stok = $sisa_stok WHERE id_produk = '$id_produk'");
}

}
?>