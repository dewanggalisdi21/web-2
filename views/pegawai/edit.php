<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../models/Pegawai.php';

use models\Pegawai;

$id = $_GET['id'];
$data = Pegawai::find($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Pegawai::update($id, $_POST);
    header("Location: index.php");
}

include '../template/header.php';
?>

<h1 class="mt-4">Edit Pegawai</h1>
<form method="POST">
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="Laki-Laki" <?= $data['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
            <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>