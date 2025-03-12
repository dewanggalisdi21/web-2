<?php
require_once "data-form-regis.php";

$nim = $_POST["nim"];
$nama = $_POST["nama_lengkap"];
$jk = $_POST["jenis_kelamin"];
$prodi = $_POST["program_studi"];
$email = $_POST["email"];
$domisili = $_POST["domisili"];

$skor_skill = skor_skil($skill_pilihan, $ar_skill);

$kategori_skill = kategori_skill($skor_skill);


function skor_skill($skill_pilihan, $ar_skill) {
    $skor_0;

    foreach($skill_pilihan as $skill){
        if(isset($ar_skill)) {
            $skor = $skor + $ar_skill[$skill];
        }

    }

    return $skor;
}

function kategori_skill($skor_skill = 0) {
    switch ($skor_skill) {
        case 0:
            return "Tidak Memadai";
            break;
        case $skor_skill <= 40:
            return "Tidak Memadai";
            break;
        case $skor_skill <= 60:
            return "Tidak Memadai";
            break;
        case $skor_skill <= 100:
            return "Tidak Memadai";
            break;
        case $skor_skill <= 150:
            return "Tidak Memadai";
            break;
        default:
        return "Tidak Terkatagori";
        break;
    }
}