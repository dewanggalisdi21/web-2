<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    if ($produk == "TV") {
        $harga = 4200000;
    } elseif ($produk == "Kulkas") {
        $harga = 3100000;
    } elseif ($produk == "Mesin Cuci") {
        $harga = 3800000;
    }

    $total = $jumlah * $harga;

    echo "Nama Pelanggan: $nama<br>";
    echo "Produk Pilihan: $produk<br>";
    echo "Jumlah Beli: $jumlah";
    echo "Total Belanja: Rp " . number_format($total, 0, ',', '.') . "<br>";


}
?>