<?php
require '../../models/Anggota.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Anggota;

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$data = Anggota::find($id);

if (!$data) {
    echo "Data anggota tidak ditemukan.";
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Detail Anggota</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($data['id']) ?></td>
    </tr>
    <tr>
        <th>Pegawai</th>
        <td><?= htmlspecialchars($data['pegawai_id']) ?></td>
    </tr>
    <tr>
        <th>Status Aktif</th>
        <td><?= $data['status_aktif'] ? 'Aktif' : 'Tidak Aktif' ?></td>
    </tr>
    <tr>
        <th>Kartu Diskon</th>
        <td><?= htmlspecialchars($data['kartu_diskon_id'] ?? '-') ?></td>
    </tr>
</table>

<a href="index.php" class="btn btn-secondary">Kembali</a>

<?php include '../template/footer.php'; ?>