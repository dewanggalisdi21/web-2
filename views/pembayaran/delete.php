<?php
require '../../models/Pembayaran.php';

use models\Pembayaran;

$id = $_GET['id'];
Pembayaran::delete($id);
header("Location: index.php");
