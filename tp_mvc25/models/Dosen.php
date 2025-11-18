<?php
require_once __DIR__ . "/../config/Config.php";

class Dosen extends Config
{
    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua dosen
    public function getDosen()
    {
        $query = "SELECT * FROM dosen";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Tambah dosen
    public function add($data)
    {
        $query = "INSERT INTO dosen (name, nidn, phone, Gmail, join_date)
                  VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['Gmail'],
            $data['join_date']
        ]);
    }

    // Ambil satu dosen
    public function getById($id)
    {
        $query = "SELECT * FROM dosen WHERE id_dosen = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update($data)
    {
        $query = "UPDATE dosen 
                  SET name=?, nidn=?, phone=?, Gmail=?, join_date=?
                  WHERE id_dosen=?";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['Gmail'],
            $data['join_date'],
            $data['id_dosen']
        ]);
    }

    // Hapus
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM dosen WHERE id_dosen=?");
        return $stmt->execute([$id]);
    }
}
