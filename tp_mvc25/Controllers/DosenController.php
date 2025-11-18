<?php
require_once __DIR__ . "/../models/Dosen.php";

class DosenController
{
    private $dosen;
    public $data = [];

    public function __construct()
    {
        $this->dosen = new Dosen();
    }

    // READ
    public function index()
    {
        $stmt = $this->dosen->getDosen();
        $this->data['dosen'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . "/../views/DosenView.php";
    }

    // ADD
    public function add()
    {
        if (!empty($_POST)) {
            $this->dosen->add($_POST);
        }
        header("Location: index.php?page=dosen");
        exit;
    }

    // EDIT
    public function edit($id)
    {
        if (!empty($_POST)) {
            $_POST['id_dosen'] = $id;
            $this->dosen->update($_POST);

            header("Location: index.php?page=dosen");
            exit;
        }

        $this->data['edit'] = $this->dosen->getById($id);


        require __DIR__ . "/../views/DosenView.php";
    }

    // DELETE
    public function delete($id)
    {
        $this->dosen->delete($id);

        header("Location: index.php?page=dosen");
        exit;
    }
}
