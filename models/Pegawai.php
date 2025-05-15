<?php

namespace models;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pegawai
{
    public static function all()
    {
        $pdo = Connection::make();
        $stmt = $pdo->query("SELECT * FROM pegawai");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("SELECT * FROM pegawai WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("INSERT INTO pegawai (nip, nama, jenis_kelamin, jabatan) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nip'], $data['nama'], $data['jenis_kelamin'], $data['jabatan']]);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("UPDATE pegawai SET nip = ?, nama = ?, jenis_kelamin = ?, jabatan = ? WHERE id = ?");
        return $stmt->execute([$data['nip'], $data['nama'], $data['jenis_kelamin'], $data['jabatan'], $id]);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("DELETE FROM pegawai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
