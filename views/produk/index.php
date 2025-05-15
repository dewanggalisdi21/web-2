<?php
require_once __DIR__ . '/../../vendor/autoload.php';

require '../../models/Produk.php';

use models\Produk;

$data = Produk::all();
include '../template/header.php';
?>

<h1 class="mt-4">Data Produk</h1>
<a href="create.php" class="btn btn-primary mb-3">Tambah Produk</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['kode'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jenis'] ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= $row['stok'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus produk?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include '../template/footer.php'; ?>