<?php
require_once __DIR__ . "/../models/Jadwal.php";
require_once __DIR__ . "/../models/Dosen.php";
require_once __DIR__ . "/../models/MataKuliah.php";

class JadwalController
{
    private $jadwal;
    private $dosen;
    private $matkul;
    public $data = [];

    public function __construct()
    {
        $this->jadwal = new Jadwal();
        $this->dosen  = new Dosen();
        $this->matkul = new MataKuliah();
    }

    // READ
    public function index()
{
$this->data['jadwal'] = $this->jadwal->getJadwal();

    $this->data['dosen']  = $this->dosen->getDosen()->fetchAll(PDO::FETCH_ASSOC);
    $this->data['matkul'] = $this->matkul->getAll(); // SUDAH ARRAY
    $this->data['edit']   = null;

    require __DIR__ . '/../views/JadwalView.php';
}


    // ADD
    public function add()
    {
        if (!empty($_POST)) {

            $this->jadwal->add($_POST);

            header("Location: index.php?page=jadwal");
            exit;
        }

        $this->index();
    }

    // EDIT
    public function edit($id)
    {
        if (!empty($_POST)) {

            $_POST['id_jadwal'] = $id;
            $this->jadwal->update($_POST);

            header("Location: index.php?page=jadwal");
            exit;
        }
        $this->data['jadwal'] = $this->jadwal->getJadwal();
        $this->data['dosen']  = $this->dosen->getDosen();
        $this->data['matkul'] = $this->matkul->getAll();
        $this->data['edit']   = $this->jadwal->getById($id);


        require __DIR__ . "/../views/JadwalView.php";
    }

    // DELETE
    public function delete($id)
    {
        $this->jadwal->delete($id);

        header("Location: index.php?page=jadwal");
        exit;
    }
}
