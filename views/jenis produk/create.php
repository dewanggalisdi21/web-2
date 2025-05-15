<?php
require '../../models/Jenis_produk.php';

use models\Jenis_produk;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Jenis_produk::store($_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Tambah Jenis Produk</h1>
<form method="POST">
    <div class="mb-3">
        <label>Nama produk</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>