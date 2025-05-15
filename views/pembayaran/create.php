<?php
require '../../models/Pembayaran.php';
require '../../models/Pesanan.php';

use models\Pembayaran;
use models\Pesanan;

$pesanan = Pesanan::all(); // Ambil semua pesanan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Pembayaran::store($_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Tambah Pembayaran</h1>
<form method="POST">
    <div class="mb-3">
        <label>Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Bayar</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Pilih Pesanan</label>
        <select name="pesanan_id" class="form-control" required>
            <?php foreach ($pesanan as $p): ?>
                <option value="<?= $p['id'] ?>">#<?= $p['id'] ?> - <?= $p['tanggal'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>