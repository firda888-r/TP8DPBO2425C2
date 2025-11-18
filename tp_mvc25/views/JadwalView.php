<?php
$data = $this->data ?? [];

$jadwalList = $data['jadwal'] ?? [];
$editMode   = isset($data['edit']);
$e          = $editMode ? $data['edit'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Jadwal Mengajar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-4">

    <!-- TABLE LIST -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white text-center">
            <h3>Jadwal Mengajar</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Dosen</th>
                    <th>Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($jadwalList as $j): ?>
                    <tr>
                        <td><?= $j['id_jadwal'] ?></td>
                        <td><?= $j['nama_dosen'] ?></td>
                        <td><?= $j['nama_matkul'] ?></td>
                        <td><?= $j['hari'] ?></td>
                        <td><?= $j['jam_mengajar'] ?></td>
                        <td><?= $j['ruangan'] ?></td>

                        <td>
                            <a href="index.php?page=jadwal&edit=<?= $j['id_jadwal'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="index.php?page=jadwal&delete=<?= $j['id_jadwal'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>


    <!-- FORM ADD / EDIT -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <?= $editMode ? "Edit Jadwal" : "Tambah Jadwal" ?>
        </div>

        <div class="card-body">

            <form method="POST" 
                  action="index.php?page=jadwal<?= $editMode ? '&edit='.$e['id_jadwal'] : '&add=true' ?>">

                <div class="mb-3">
                    <label class="form-label">ID Dosen</label>
                    <input type="number"
                           name="id_dosen"
                           class="form-control"
                           value="<?= $editMode ? $e['id_dosen'] : '' ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ID Mata Kuliah</label>
                    <input type="number"
                           name="id_matkul"
                           class="form-control"
                           value="<?= $editMode ? $e['id_matkul'] : '' ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <input type="text"
                           name="hari"
                           class="form-control"
                           value="<?= $editMode ? $e['hari'] : '' ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Mengajar</label>
                    <input type="text"
                           name="jam_mengajar"
                           class="form-control"
                           value="<?= $editMode ? $e['jam_mengajar'] : '' ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ruangan</label>
                    <input type="text"
                           name="ruangan"
                           class="form-control"
                           value="<?= $editMode ? $e['ruangan'] : '' ?>"
                           required>
                </div>

                <button class="btn btn-success"><?= $editMode ? "Update" : "Tambah" ?></button>
                <a href="index.php?page=jadwal" class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </div>

</div>
</body>
</html>
