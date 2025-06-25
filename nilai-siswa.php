<?php
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$matkul = isset($_POST['matkul']) ? $_POST['matkul'] : '';
$nilai_uts = isset($_POST['nilai_uts']) ? $_POST['nilai_uts'] : '';
$nilai_uas = isset($_POST['nilai_uas']) ? $_POST['nilai_uas'] : '';
$nilai_tugas = isset($_POST['nilai_tugas']) ? $_POST['nilai_tugas'] : '';

if (isset($_POST['submit'])) {
    $total = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

    echo "<br><br>";
    echo "Nama: $nama<br>";
    echo "Mata Kuliah: $matkul<br>";
    echo "Nilai UTS: $nilai_uts<br>";
    echo "Nilai UAS: $nilai_uas<br>";
    echo "Nilai Tugas/Praktikum: $nilai_tugas<br>";
    echo "Nilai Total: $total<br>";

    if ($total > 55) {
        echo "Status: <b>LULUS</b>";
    } else {
        echo "Status: <b>TIDAK LULUS</b>";
    }
}
?>