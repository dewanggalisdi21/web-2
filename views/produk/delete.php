<?php
require '../../models/Produk.php';

use models\Produk;

$id = $_GET['id'];
Produk::delete($id);
header("Location: index.php");
