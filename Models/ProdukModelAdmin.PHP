<?php
require_once 'Core/Database.php';

class ProdukModelAdmin {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Ambil semua produk + kategori
    public function getAllProduk() {
        $query = "SELECT p.*, k.nama_kategori 
                  FROM produk p 
                  JOIN kategori k ON p.id_kategori = k.id_kategori";
        return $this->conn->query($query);
    }

    // Ambil semua kategori
    public function getAllKategori() {
        return $this->conn->query("SELECT * FROM kategori");
    }

    // Ambil produk berdasarkan ID
    public function getProdukById($id) {
        $stmt = $this->conn->prepare("SELECT p.*, k.nama_kategori 
                                      FROM produk p 
                                      JOIN kategori k ON p.id_kategori = k.id_kategori 
                                      WHERE p.id_produk = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Ambil produk berdasarkan filter kategori
    public function getProdukFiltered($filter) {
        $sql = "SELECT p.*, k.nama_kategori 
                FROM produk p 
                JOIN kategori k ON p.id_kategori = k.id_kategori";
        if (!empty($filter)) {
            $sql .= " WHERE p.id_kategori = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $filter);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return $this->conn->query($sql);
        }
    }

    // Tambah produk baru (pakai kolom gambar)
    public function tambahProduk($nama, $harga, $stok, $id_kategori, $gambar) {
        $stmt = $this->conn->prepare("INSERT INTO produk (nama, harga, stok, id_kategori, gambar) 
                                      VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdiis", $nama, $harga, $stok, $id_kategori, $gambar);
        return $stmt->execute();
    }

    // Update produk (boleh tanpa ganti gambar)
    public function updateProduk($id, $nama, $harga, $stok, $id_kategori, $gambar = null) {
        if ($gambar) {
            $stmt = $this->conn->prepare("UPDATE produk 
                                          SET nama=?, harga=?, stok=?, id_kategori=?, gambar=? 
                                          WHERE id_produk=?");
            $stmt->bind_param("sdiisi", $nama, $harga, $stok, $id_kategori, $gambar, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE produk 
                                          SET nama=?, harga=?, stok=?, id_kategori=? 
                                          WHERE id_produk=?");
            $stmt->bind_param("sdiii", $nama, $harga, $stok, $id_kategori, $id);
        }
        return $stmt->execute();
    }

    // Hapus produk
    public function hapusProduk($id) {
        $stmt = $this->conn->prepare("DELETE FROM produk WHERE id_produk = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
