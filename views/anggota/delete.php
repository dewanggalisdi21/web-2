<?php
require '../../models/Anggota.php';

use models\Anggota;
use models\Pegawai;

$id = $_GET['id'];
Anggota::delete($id);
header("Location: index.php");
