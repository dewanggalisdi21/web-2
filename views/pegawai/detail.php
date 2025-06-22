<?php
require '../../models/Pegawai.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use models\Pegawai;

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}
$id = $_GET['id'];
$data = Pegawai::find($id);
if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Detail Pegawai</h1>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($data['id']) ?></td>
    </tr>
    <tr>
        <th>NIP</th>
        <td><?= htmlspecialchars($data['nip']) ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?= htmlspecialchars($data['nama']) ?></td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td><?= htmlspecialchars($data['jenis_kelamin']) ?></td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td><?= htmlspecialchars($data['jabatan']) ?></td>
    </tr>
</table>
<a href="index.php" class="btn btn-secondary">Kembali</a>
<?php include '../template/footer.php'; ?>