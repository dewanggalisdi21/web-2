<?php
require_once __DIR__ . '/../../models/Pesanan.php';

use models\Pesanan;

$id = $_GET['id'];

if (Pesanan::delete($id)) {
    header("Location: index.php");
} else {
    die("Gagal menghapus pesanan. Pastikan tidak ada data terkait yang masih tersimpan.");
}
