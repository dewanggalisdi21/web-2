<?php
require '../../models/Produk.php';
require '../../models/Jenis_produk.php';

use models\Produk;
use models\Jenis_produk;

$id = $_GET['id'];
$data = Produk::find($id);
$jenis = Jenis_Produk::all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Produk::update($id, $_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Edit Produk</h1>
<form method="POST">
    <div class="mb-3">
        <label>Kode</label>
        <input type="text" name="kode" class="form-control" value="<?= $data['kode'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" step="0.01" value="<?= $data['harga'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Jenis Produk</label>
        <select name="jenis_produk_id" class="form-control" required>
            <?php foreach ($jenis as $j): ?>
                <option value="<?= $j['id'] ?>" <?= $j['id'] == $data['jenis_produk_id'] ? 'selected' : '' ?>>
                    <?= $j['nama'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>