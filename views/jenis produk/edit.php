<?php
require '../../models/Jenis_produk.php';

use models\Jenis_produk;

$id = $_GET['id'];
$data = Jenis_produk::find($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Jenis_produk::update($id, $_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Edit Jenis Produk</h1>
<form method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required><?= $data['deskripsi'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>