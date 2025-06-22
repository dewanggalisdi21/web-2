<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Detail_pesanan.php';
require '../../models/Pesanan.php';


use models\Detail_pesanan;
use models\Pesanan;

$pesanan_id = $_GET['pesanan_id'];
$pesanan = Pesanan::find($pesanan_id);
$data = Detail_pesanan::all($pesanan_id);

include '../template/header.php';
?>

<h1 class="mt-4">Detail Pesanan <?= $pesanan_id ?></h1>
<p>
    <strong>Tanggal:</strong> <?= htmlspecialchars($pesanan['tanggal'] ?? '-') ?> |
    <strong>Status Bayar:</strong> <?= ($pesanan['status_bayar'] ?? 0) ? 'Lunas' : 'Belum' ?>
</p>

<a href="create.php?pesanan_id=<?= $pesanan_id ?>" class="btn btn-primary mb-3">Tambah Produk</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        foreach ($data as $row):
            $subtotal = $row['jumlah'] * $row['harga'];
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                <td>
                    <a href="delete.php?pesanan_id=<?= $pesanan_id ?>&produk_id=<?= $row['produk_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini dari pesanan?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th colspan="2">Rp <?= number_format($total, 0, ',', '.') ?></th>
        </tr>
    </tfoot>
</table>

<a href="../pesanan/index.php" class="btn btn-secondary">Kembali ke Pesanan</a>

<?php include '../template/footer.php'; ?>