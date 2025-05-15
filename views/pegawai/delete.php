<?php
require_once __DIR__ . '/../../models/Pegawai.php';


use models\Pegawai;

$id = $_GET['id'];
Pegawai::delete($id);
header("Location: index.php");
