<?php
require '../../models/Pesanan.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Pesanan;

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}
$id = $_GET['id'];
$data = Pesanan::find($id);
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Detail Pesanan</h1>
<table class="table table-bordered">
    <tr>
        <th>Tanggal Pesan</th>
        <td><?= htmlspecialchars($data['tanggal']) ?></td>
    </tr>
    <tr>
        <th>Anggota</th>
        <td><?= htmlspecialchars($data['anggota_id']) ?></td>
    </tr>
    <tr>
        <th>Diskon (%)</th>
        <td><?= htmlspecialchars($data['diskon']) ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= htmlspecialchars($data['status_bayar']) ?></td>
    </tr>
</table>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<?php include '../template/footer.php'; ?>