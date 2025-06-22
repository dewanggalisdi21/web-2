<?php
require '../../models/Pembayaran.php';
require '../../models/Pesanan.php';

use models\Pembayaran;
use models\Pesanan;

$id = $_GET['id'];
$data = Pembayaran::find($id);
$pesanan = Pesanan::all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Pembayaran::update($id, $_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Edit Pembayaran</h1>
<form method="POST">
    <div class="mb-3">
        <label>Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" class="form-control" value="<?= $data['jumlah_bayar'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Pilih Pesanan</label>
        <select name="pesanan_id" class="form-control" required>
            <?php foreach ($pesanan as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['pesanan_id'] ? 'selected' : '' ?>>
                    #<?= $p['id'] ?> - <?= $p['tanggal'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>