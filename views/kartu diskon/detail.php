<?php
require '../../models/Kartu_diskon.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Kartu_diskon;

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}
$id = $_GET['id'];
$data = Kartu_diskon::find($id);
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Detail Kartu Diskon</h1>
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
        <th>Deskripsi</th>
        <td><?= htmlspecialchars($data['deskripsi']) ?></td>
    </tr>
    <tr>
        <th>Diskon (%)</th>
        <td><?= htmlspecialchars($data['persen_diskon']) ?></td>
    </tr>
</table>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<?php include '../template/footer.php'; ?>