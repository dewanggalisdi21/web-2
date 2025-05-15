<?php
require '../../models/Pembayaran.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Pembayaran;

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}
$id = $_GET['id'];
$data = Pembayaran::find($id);
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Detail Pembayaran</h1>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($data['id']) ?></td>
    </tr>
    <tr>
        <th>ID Pesanan</th>
        <td><?= htmlspecialchars($data['pesanan_id']) ?></td>
    </tr>
    <tr>
        <th>Tanggal Bayar</th>
        <td><?= htmlspecialchars($data['tanggal']) ?></td>
    </tr>
    <tr>
        <th>Jumlah Bayar</th>
        <td><?= htmlspecialchars($data['jumlah_bayar']) ?></td>
    </tr>
</table>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<?php include '../template/footer.php'; ?>