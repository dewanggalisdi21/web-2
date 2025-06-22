<?php
require '../../models/Anggota.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Anggota;

$data = Anggota::all();
include '../template/header.php';
?>

<h1 class="mt-4">Data Anggota</h1>
<a href="create.php" class="btn btn-primary mb-3">Tambah Anggota</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pegawai</th>
            <th>Status Aktif</th>
            <th>Kartu Diskon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_pegawai'] ?></td>
                <td><?= $row['status_aktif'] ? 'Aktif' : 'Tidak Aktif' ?></td>
                <td><?= $row['kartu_diskon_id'] ?? '-' ?></td>
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