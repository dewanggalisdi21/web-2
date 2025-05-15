<?php
require '../../models/Detail_pesanan.php';

use models\Detail_pesanan;

$pesanan_id = $_GET['pesanan_id'];
$produk_id = $_GET['produk_id'];

Detail_pesanan::delete($pesanan_id, $produk_id);
header("Location: index.php?pesanan_id=$pesanan_id");
