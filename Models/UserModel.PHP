<?php
require_once 'Core/Database.php';

class UserModel {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this -> db -> getConnection (); 
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM pelanggan WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function register($nama, $phone, $alamat, $email, $password) {
        $stmt = $this->conn->prepare("INSERT INTO pelanggan (nama, phone, alamat, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama, $phone, $alamat, $email, $password);
        return $stmt->execute();
    }

   public function getPelangganById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    }

    public function updatePelanggan($id, $nama, $alamat, $phone, $foto = null) {
    if ($foto) {
        $stmt = $this->conn->prepare("UPDATE pelanggan SET nama=?, alamat=?, phone=?, foto=? WHERE id_pelanggan=?");
        $stmt->bind_param("ssssi", $nama, $alamat, $phone, $foto, $id);
    } else {
        $stmt = $this->conn->prepare("UPDATE pelanggan SET nama=?, alamat=?, phone=? WHERE id_pelanggan=?");
        $stmt->bind_param("sssi", $nama, $alamat, $phone, $id);
    }
    return $stmt->execute();
    }

public function loginAdmin($email, $password) {
    $stmt = $this->conn->prepare("SELECT * FROM admin WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    }

public function getAdminById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM admin WHERE id_admin = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function updateAdmin($id, $nama, $email, $foto = null) {
    if ($foto) {
        $stmt = $this->conn->prepare("UPDATE admin SET nama=?, email=?, foto=? WHERE id_admin=?");
        $stmt->bind_param("sssi", $nama, $email, $foto, $id);
    } else {
        $stmt = $this->conn->prepare("UPDATE admin SET nama=?, email=? WHERE id_admin=?");
        $stmt->bind_param("ssi", $nama, $email, $id);
    }
    return $stmt->execute();
}

}
?>

