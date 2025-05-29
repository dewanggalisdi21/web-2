<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Anggota
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT anggota.*, pegawai.nip, pegawai.nama AS nama_pegawai, pegawai.jenis_kelamin, pegawai.jabatan,
                   kartu_diskon.nama AS nama_kartu_diskon, kartu_diskon.deskripsi AS deskripsi_kartu, kartu_diskon.persen_diskon
            FROM anggota
            LEFT JOIN pegawai ON anggota.pegawai_id = pegawai.id
            LEFT JOIN kartu_diskon ON anggota.kartu_diskon_id = kartu_diskon.id';
        $statement = $pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
