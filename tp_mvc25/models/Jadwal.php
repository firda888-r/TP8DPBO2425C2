<?php
require_once __DIR__ . "/../config/Config.php";

class Jadwal extends Config
{
    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua jadwal
   public function getjadwal()
{
    $sql = "SELECT j.*, d.name AS nama_dosen, mk.nama_matkul 
            FROM jadwal j
            LEFT JOIN dosen d ON j.id_dosen = d.id_dosen
            LEFT JOIN mata_kuliah mk ON j.id_matkul = mk.id_matkul";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    // Tambah jadwal
    public function add($data)
    {
        $query = "INSERT INTO jadwal (id_dosen, id_matkul, hari, jam_mengajar, ruangan)
                  VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['id_dosen'],
            $data['id_matkul'],
            $data['hari'],
            $data['jam_mengajar'],
            $data['ruangan']
        ]);
    }

    // Ambil satu jadwal
    public function getById($id)
    {
        $query = "SELECT * FROM jadwal WHERE id_jadwal = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update($data)
    {
        $query = "UPDATE jadwal 
                  SET id_dosen=?, id_matkul=?, hari=?, jam_mengajar=?, ruangan=?
                  WHERE id_jadwal=?";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['id_dosen'],
            $data['id_matkul'],
            $data['hari'],
            $data['jam_mengajar'],
            $data['ruangan'],
            $data['id_jadwal']
        ]);
    }

    // Delete
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM jadwal WHERE id_jadwal=?");
        return $stmt->execute([$id]);
    }
}
