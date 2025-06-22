<?php

namespace models;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Anggota
{
    public static function all()
    {
        $pdo = Connection::make();
        $stmt = $pdo->query("
            SELECT a.*, p.nama AS nama_pegawai, k.nama AS nama_diskon
            FROM anggota a
            JOIN pegawai p ON a.pegawai_id = p.id
            LEFT JOIN kartu_diskon k ON a.kartu_diskon_id = k.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("SELECT * FROM anggota WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("
            INSERT INTO anggota (status_aktif, pegawai_id, kartu_diskon_id) 
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            isset($data['status_aktif']) ? 1 : 0,
            $data['pegawai_id'] ?? null,
            $data['kartu_diskon_id'] ?? null
        ]);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("
            UPDATE anggota 
            SET status_aktif = ?, pegawai_id = ?, kartu_diskon_id = ? 
            WHERE id = ?
        ");

        return $stmt->execute([
            isset($data['status_aktif']) ? 1 : 0,
            $data['pegawai_id'] ?? null,
            $data['kartu_diskon_id'] ?? null,
            $id
        ]);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("DELETE FROM anggota WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
