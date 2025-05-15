<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../../models/Anggota.php';
require_once '../../models/Pegawai.php';
require_once '../../models/Kartu_diskon.php';

use models\Anggota;
use models\Pegawai;
use models\Kartu_diskon;

$id = $_GET['id'];
$data = Anggota::find($id);
$pegawai = Pegawai::all();
$diskon = Kartu_diskon::all();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Anggota::update($id, $_POST);
    header("Location: index.php");
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Edit Anggota</h1>
<form method="POST">
    <div class="mb-3">
        <label>Pegawai</label>
        <select name="pegawai_id" class="form-control" required>
            <?php foreach ($pegawai as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['pegawai_id'] ? 'selected' : '' ?>>
                    <?= $p['nip'] ?> - <?= $p['nama'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="status_aktif" value="1" class="form-check-input" id="statusAktif"
            <?= $data['status_aktif'] ? 'checked' : '' ?>>
        <label for="statusAktif" class="form-check-label">Status Aktif</label>
    </div>

    <div class="mb-3">
        <label>Kartu Diskon</label>
        <select name="kartu_diskon_id" class="form-control">
            <option value="">-- Tanpa Diskon --</option>
            <?php foreach ($diskon as $d): ?>
                <option value="<?= $d['id'] ?>" <?= $d['id'] == $data['kartu_diskon_id'] ? 'selected' : '' ?>>
                    <?= $d['nama'] ?> (<?= $d['persen_diskon'] ?>%)
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>

<?php include '../template/footer.php'; ?>