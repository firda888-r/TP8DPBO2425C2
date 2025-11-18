<?php
$data = $data ?? [];
$matkulList = $data['matkul'] ?? [];
$dosenList = $data['dosen'] ?? [];
$editMode = isset($data['edit']) && $data['edit'] !== null;
$e = $editMode ? $data['edit'] : null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-4">
    <h3>Mata Kuliah</h3>

    <a href="index.php?page=matakuliah&add=true" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Dosen</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($matkulList as $m): ?>
            <tr>
                <td><?= $m['id_matkul'] ?></td>
                 <td><?= $m['id_dosen'] ?></td>
                <td><?= $m['kode_matkul'] ?></td>
                <td><?= $m['nama_matkul'] ?></td>
                <td><?= $m['semester'] ?></td>
                <td>
                    <a href="index.php?page=matakuliah&edit=<?= $m['id_matkul'] ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="index.php?page=matakuliah&delete=<?= $m['id_matkul'] ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="card mt-4">
        <div class="card-header"><?= $editMode ? "Edit Mata Kuliah" : "Tambah Mata Kuliah" ?></div>
        <div class="card-body">
            <form method="POST" action="index.php?page=matakuliah<?= $editMode ? "&edit=".$e['id_matkul'] : "&add=true" ?>">

                <?php if ($editMode): ?>
                    <input type="hidden" name="id_matkul" value="<?= $e['id_matkul'] ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label>Id Dosen</label>
                    <input class="form-control" name="id_dosen" value="<?= $editMode ? $e['id_dosen'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kode Matkul</label>
                    <input class="form-control" name="kode_matkul" value="<?= $editMode ? $e['kode_matkul'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label>Nama Matkul</label>
                    <input class="form-control" name="nama_matkul" value="<?= $editMode ? $e['nama_matkul'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label>Semester</label>
                    <input class="form-control" name="semester" value="<?= $editMode ? $e['semester'] : '' ?>" required>
                </div>

                <button class="btn btn-success"><?= $editMode ? "Update" : "Tambah" ?></button>
                <a href="index.php?page=matakuliah" class="btn btn-secondary">Cancel</a>

            </form>
        </div>
    </div>

</div>
</body>
</html>
