<?php
$pdo = require 'Connection.php';
$statement = $pdo->query('select * from anggota,detail_pesanan,jenis_produk,kartu_diskon,pegawai,pembayaran,pesanan,produk');
print_r($statement->fetchAll());
