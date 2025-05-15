<?php
require '../../models/Pembayaran.php';


use models\Pembayaran;

$data = Pembayaran::all();
include '../template/header.php';
?>

<h1 class="mt-4">Data Pembayaran</h1>
<a href="create.php" class="btn btn-primary mb-3">Tambah Pembayaran</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Pegawai</th>
            <th>Jumlah Bayar</th>
            <th>ID Pesanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nama_pegawai'] ?></td>
                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                <td><?= $row['pesanan_id'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus pembayaran?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include '../template/footer.php'; ?>