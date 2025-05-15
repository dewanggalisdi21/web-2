<?php
require_once __DIR__ . '/../../models/Kartu_diskon.php';


use models\Kartu_diskon;

$id = $_GET['id'];
Kartu_diskon::delete($id);
header("Location: index.php");
