<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Kartu_diskon.php';

use models\Kartu_diskon;

$id = $_GET['id'];
$data = Kartu_diskon::find($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Kartu_diskon::update($id, $_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Edit Kartu Diskon</h1>
<form method="POST">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required><?= $data['deskripsi'] ?></textarea>
    </div>
    <div class="mb-3">
        <label>Diskon (%)</label>
        <input type="number" name="persen_diskon" class="form-control" value="<?= $data['persen_diskon'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>