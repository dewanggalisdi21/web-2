<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Kartu_diskon.php';

use models\Kartu_diskon;

$data = Kartu_diskon::all();
include '../template/header.php';
?>

<h1 class="mt-4">Data Kartu Diskon</h1>
<a href="create.php" class="btn btn-primary mb-3">Tambah Kartu Diskon</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Diskon (%)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td><?= $row['persen_diskon'] ?>%</td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include '../template/footer.php'; ?>