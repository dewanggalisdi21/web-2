<?php
require_once __DIR__ . '/../../vendor/autoload.php';

require '../../models/Pesanan.php';

use models\Pesanan;

$data = Pesanan::all();
include '../template/header.php';
?>

<h1 class="mt-4">Data Pesanan</h1>
<a href="create.php" class="btn btn-primary mb-3">Tambah Pesanan</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Anggota</th>
            <th>Diskon (%)</th>
            <th>Status Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama_anggota'] ?></td>
                <td><?= $row['diskon'] ?>%</td>
                <td><?= $row['status_bayar'] ? 'Lunas' : 'Belum Lunas' ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus pesanan?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include '../template/footer.php'; ?>