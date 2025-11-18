<?php
require_once __DIR__ . "/../config/Config.php";

class MataKuliah extends Config
{
    public function getAll()
    {
        $sql = "SELECT mk.*, d.name 
                FROM mata_kuliah mk
                LEFT JOIN dosen d ON mk.id_dosen = d.id_dosen";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM mata_kuliah WHERE id_matkul=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data)
    {
        $sql = "INSERT INTO mata_kuliah (kode_matkul, nama_matkul, semester, id_dosen)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['kode_matkul'],
            $data['nama_matkul'],
            $data['semester'],
            $data['id_dosen']
        ]);
    }

    public function update($data)
    {
        $sql = "UPDATE mata_kuliah
                SET kode_matkul=?, nama_matkul=?, semester=?, id_dosen=?
                WHERE id_matkul=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['kode_matkul'],
            $data['nama_matkul'],
            $data['semester'],
            $data['id_dosen'],
            $data['id_matkul']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM mata_kuliah WHERE id_matkul=?");
        return $stmt->execute([$id]);
    }
}
