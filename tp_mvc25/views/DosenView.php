<?php
$data = $this->data ?? [];
$dosenList = $data['dosen'] ?? [];
$editMode = isset($data['edit']);
$e = $editMode ? $data['edit'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-4">

    <div class="card mb-4">
        <div class="card-header bg-dark text-white text-center">
            <h3>Data Dosen</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Phone</th>
                    <th>Gmail</th>
                    <th>Tanggal Bergabung</th>
                    <th>Aksi</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($dosenList as $d): ?>
                    <tr>
                        <td><?= $d['id_dosen'] ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['nidn'] ?></td>
                        <td><?= $d['phone'] ?></td>
                        <td><?= $d['Gmail'] ?></td>
                        <td><?= $d['join_date'] ?></td>
                        <td>
                            <a href="index.php?page=dosen&edit=<?= $d['id_dosen'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="index.php?page=dosen&delete=<?= $d['id_dosen'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>


    <!-- FORM -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <?= $editMode ? "Edit Dosen" : "Tambah Dosen" ?>
        </div>

        <div class="card-body">
            <form method="POST" action="index.php?page=dosen<?= $editMode ? "&edit=".$e['id_dosen'] : "&add=true" ?>">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control"
                           value="<?= $editMode ? $e['name'] : "" ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control"
                           value="<?= $editMode ? $e['nidn'] : "" ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" name="phone" class="form-control"
                           value="<?= $editMode ? $e['phone'] : "" ?>" required>
                </div>

               <div class="mb-3">
                    <label class="form-label">Gmail</label>
                    <input type="text" name="Gmail" class="form-control"
                           value="<?= $editMode ? $e['Gmail'] : "" ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Bergabung</label>
                    <input type="date" name="join_date" class="form-control"
                           value="<?= $editMode ? $e['join_date'] : "" ?>" required>
                </div>

                                <?php if ($editMode): ?>
                    <input type="hidden" name="id_dosen" value="<?= $e['id_dosen'] ?>">
                    <input type="hidden" name="update" value="1">
                <?php else: ?>
                    <input type="hidden" name="add" value="1">
                <?php endif; ?>


                <button class="btn btn-success">
                    <?= $editMode ? "Update" : "Tambah" ?>
                </button>


            </form>
        </div>
    </div>

</div>
</body>
</html>
