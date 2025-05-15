<?php
require '../../models/Jenis_produk.php';

use models\Jenis_produk;

$id = $_GET['id'];
Jenis_produk::delete($id);
header("Location: index.php");
