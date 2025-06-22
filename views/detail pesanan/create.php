<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Detail_pesanan.php';
require '../../models/Produk.php';

use models\Detail_pesanan;
use models\Produk;

$pesanan_id = $_GET['pesanan_id'];
$produk = Produk::all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Detail_pesanan::store($pesanan_id, $_POST['produk_id'], $_POST['jumlah']);
    header("Location: index.php?pesanan_id=$pesanan_id");

    if (!isset($_GET['pesanan_id']) || empty($_GET['pesanan_id'])) {
        die('Pesanan ID tidak ditemukan.');
    }
}

include '../template/header.php';
?>

<h1 class="mt-4">Tambah Produk ke Pesanan #<?= $pesanan_id ?></h1>
<form method="POST" action="create.php?pesanan_id=<?= $pesanan_id ?>">
    <div class="mb-3">
        <label>Produk</label>
        <select name="produk_id" class="form-control" required>
            <?php foreach ($produk as $p): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?> (Rp <?= number_format($p['harga'], 0, ',', '.') ?>)</option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Tambah</button>
    <a href="index.php?pesanan_id=<?= $pesanan_id ?>" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>