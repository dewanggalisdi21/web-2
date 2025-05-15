<?php
require '../../models/Produk.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Produk;

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}
$id = $_GET['id'];
$data = Produk::find($id);
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Detail Produk</h1>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($data['id']) ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?= htmlspecialchars($data['nama']) ?></td>
    </tr>
    <tr>
        <th>Harga</th>
        <td><?= htmlspecialchars($data['harga']) ?></td>
    </tr>
    <tr>
        <th>Stok</th>
        <td><?= htmlspecialchars($data['stok']) ?></td>
    </tr>
    <tr>
        <th>ID Jenis Produk</th>
        <td><?= htmlspecialchars($data['jenis_produk_id']) ?></td>
    </tr>
</table>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<?php include '../template/footer.php'; ?>