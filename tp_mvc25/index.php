<?php
require_once "Controllers/DosenController.php";
require_once "Controllers/MataKuliahController.php";
require_once "Controllers/JadwalController.php";

// Routing Entity
$entity = isset($_GET['page']) ? $_GET['page'] : 'dosen';

// Tentukan controller sesuai halaman
switch ($entity) {
    case 'matakuliah':
        $controller = new MataKuliahController();
    case 'jadwal':
        $controller = new JadwalController();
    default:
        $controller = new DosenController();
}

// ---- ACTION HANDLER ----
if (isset($_POST['add'])) {
    // Tambah Data
    $controller->add($_POST);
    header("Location: index.php?page=$entity");
    exit;

} else if (!empty($_GET['delete'])) {
    // Hapus Data
    $id = $_GET['delete'];
    $controller->delete($id);
    header("Location: index.php?page=$entity");
    exit;

} else if (!empty($_POST['update'])) {
    // Update Data
    $controller->edit($_POST);
    header("Location: index.php?page=$entity");
    exit;

} else if (!empty($_GET['edit'])) {
    // Tampilkan Form Edit
    $id = $_GET['edit'];
    $controller->edit($id); 
    exit;

} else {
    // Default → Tampilkan semua data
    $controller->index();
}
