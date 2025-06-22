<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Kartu_diskon.php';

use models\Kartu_diskon;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Kartu_diskon::store($_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Tambah Kartu Diskon</h1>
<form method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Persen Diskon (%)</label>
        <input type="number" name="persen_diskon" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>