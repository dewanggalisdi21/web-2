<?php
require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../../models/Anggota.php';
require_once __DIR__ . '/../../models/Pegawai.php';
require_once __DIR__ . '/../../models/Kartu_diskon.php';

use models\Anggota;
use models\Pegawai;
use models\Kartu_diskon;

// Ambil semua pegawai
$pegawai = Pegawai::all();
$diskon = Kartu_diskon::all();

// Filter pegawai yang belum jadi anggota
$anggota_pegawai_ids = array_column(Anggota::all(), 'pegawai_id');
$pegawaiTersedia = array_filter($pegawai, function ($p) use ($anggota_pegawai_ids) {
    return !in_array($p['id'], $anggota_pegawai_ids);
});

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Anggota::store($_POST);
    header("Location: index.php");
    exit;
}

include '../template/header.php';
?>

<h1 class="mt-4">Tambah Anggota</h1>

<form method="POST">
    <div class="mb-3">
        <label for="pegawai_id" class="form-label">Nama Pegawai</label>
        <select name="pegawai_id" id="pegawai_id" class="form-control" required>
            <?php foreach ($pegawaiTersedia as $p): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nip'] ?> - <?= $p['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="status_aktif" value="1" id="aktif">
        <label class="form-check-label" for="aktif">Status Aktif</label>
    </div>

    <div class="mb-3">
        <label for="kartu_diskon_id" class="form-label">Kartu Diskon</label>
        <select name="kartu_diskon_id" id="kartu_diskon_id" class="form-control">
            <option value="">(Tanpa Diskon)</option>
            <?php foreach ($diskon as $d): ?>
                <option value="<?= $d['id'] ?>">
                    <?= $d['nama_diskon'] ?? $d['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

<?php include '../template/footer.php'; ?>