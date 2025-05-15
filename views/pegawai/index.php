<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Pegawai.php';

use models\Pegawai;

$data = Pegawai::all();
include '../template/header.php';
?>

<h1 class="mt-4">Data Pegawai</h1>
<a href="create.php" class="btn btn-primary mb-3">Tambah Pegawai</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include '../template/footer.php'; ?>