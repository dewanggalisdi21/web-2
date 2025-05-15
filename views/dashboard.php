<?php
require_once __DIR__ . '/../vendor/autoload.php';
include_once __DIR__ . '/template/header.php';
include_once __DIR__ . '/template/navbar.php';
include_once __DIR__ . '/template/sidebar.php';

// Model
require_once __DIR__ . '/../models/Anggota.php';
require_once __DIR__ . '/../models/Produk.php';
require_once __DIR__ . '/../models/Pesanan.php';
require_once __DIR__ . '/../models/Pembayaran.php';

use models\Anggota;
use models\Produk;
use models\Pesanan;
use models\Pembayaran;

// Data Ringkasan
$jmlAnggota = count(Anggota::all());
$jmlProduk = count(Produk::all());
$jmlPesanan = count(Pesanan::all());
$jmlPembayaran = count(Pembayaran::all());
?>

<main class="pt-5">
    <div class="container-fluid px-4">
        <!-- Judul dan Breadcrumb -->
        <div class="text-left mb-4">
            <h1 class="fw-bold">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-left mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Welcome to this site</li>
                </ol>
            </nav>
        </div>

        

        <!-- Kartu Ringkasan Data (2x2) -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">Anggota: <?= $jmlAnggota ?></div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a class="small text-white text-decoration-none" href="anggota/index.php">Lihat Data</a>
                        <i class="fas fa-angle-right text-white"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">Produk: <?= $jmlProduk ?></div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a class="small text-white text-decoration-none" href="produk/index.php">Lihat Data</a>
                        <i class="fas fa-angle-right text-white"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">Pesanan: <?= $jmlPesanan ?></div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a class="small text-white text-decoration-none" href="pesanan/index.php">Lihat Data</a>
                        <i class="fas fa-angle-right text-white"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">Pembayaran: <?= $jmlPembayaran ?></div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a class="small text-white text-decoration-none" href="pembayaran/index.php">Lihat Data</a>
                        <i class="fas fa-angle-right text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once __DIR__ . '/template/footer.php'; ?>