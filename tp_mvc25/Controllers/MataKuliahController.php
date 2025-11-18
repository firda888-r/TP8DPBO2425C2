<?php
require_once __DIR__ . "/../models/MataKuliah.php";
require_once __DIR__ . "/../models/Dosen.php";

class MataKuliahController
{
    private $mk;
    private $dosen;
    public $data = [];

    public function __construct()
    {
        $this->mk    = new MataKuliah();
        $this->dosen = new Dosen();
    }

    // READ
    public function index()
    {
        $this->data['matkul'] = $this->mk->getAll();
        $this->data['dosen']  = $this->dosen->getDosen()->fetchAll(PDO::FETCH_ASSOC);
        $this->data['edit']   = null;

        require __DIR__ . "/../views/MataKuliahView.php";
    }

    // ADD
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'kode_matkul' => $_POST['kode_matkul'],
                'nama_matkul' => $_POST['nama_matkul'],
                'semester'    => $_POST['semester'],
                'id_dosen'    => $_POST['id_dosen']
            ];

            $this->mk->add($data);
            header("Location: index.php?page=matakuliah");
            exit;
        }

        $this->data['matkul'] = $this->mk->getAll();
        $this->data['dosen']  = $this->dosen->getDosen()->fetchAll(PDO::FETCH_ASSOC);
        $this->data['edit']   = null;

        require __DIR__ . "/../views/MataKuliahView.php";
    }

    // EDIT
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                'id_matkul'   => $_POST['id_matkul'],
                'kode_matkul' => $_POST['kode_matkul'],
                'nama_matkul' => $_POST['nama_matkul'],
                'semester'    => $_POST['semester'],
                'id_dosen'    => $_POST['id_dosen']
            ];

            $this->mk->update($data);
            header("Location: index.php?page=matakuliah");
            exit;
        }

        $this->data['matkul'] = $this->mk->getAll();
        $this->data['dosen']  = $this->dosen->getDosen()->fetchAll(PDO::FETCH_ASSOC);
        $this->data['edit']   = $this->mk->getById($id);

        require __DIR__ . "/../views/MataKuliahView.php";
    }

    public function delete($id)
    {
        $this->mk->delete($id);
        header("Location: index.php?page=matakuliah");
        exit;
    }
}
