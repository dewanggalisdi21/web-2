<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Pesanan.php';
require '../../models/Anggota.php';

use models\Pesanan;
use models\Anggota;

$anggota = Anggota::all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Pesanan::store($_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Tambah Pesanan</h1>
<form method="POST">
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Diskon (%)</label>
        <input type="number" name="diskon" class="form-control" value="0" required>
    </div>
    <div class="mb-3">
        <label>Status Pembayaran</label><br>
        <input type="checkbox" name="status_bayar" value="1"> Lunas
    </div>
    <div class="mb-3">
        <label>Anggota</label>
        <select name="anggota_id" class="form-control" required>
            <?php foreach ($anggota as $a): ?>
                <option value="<?= $a['id'] ?>">ID <?= $a['id'] ?> - Pegawai <?= $a['pegawai_id'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>