<?php

namespace models;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pesanan
{
    public static function all()
    {
        $pdo = Connection::make();
        $stmt = $pdo->query("
            SELECT p.*, a.id AS anggota_id, pg.nama AS nama_anggota
            FROM pesanan p
            JOIN anggota a ON p.anggota_id = a.id
            JOIN pegawai pg ON a.pegawai_id = pg.id
            ORDER BY p.tanggal DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("SELECT * FROM pesanan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("INSERT INTO pesanan (tanggal, diskon, status_bayar, anggota_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $data['tanggal'],
            $data['diskon'],
            isset($data['status_bayar']) ? 1 : 0,
            $data['anggota_id']
        ]);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("UPDATE pesanan SET tanggal = ?, diskon = ?, status_bayar = ?, anggota_id = ? WHERE id = ?");
        return $stmt->execute([
            $data['tanggal'],
            $data['diskon'],
            isset($data['status_bayar']) ? 1 : 0,
            $data['anggota_id'],
            $id
        ]);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $pdo->beginTransaction();

        try {
            // Hapus detail terlebih dahulu
            Detail_pesanan::deleteByPesanan($id);

            // Hapus pesanan
            $stmt = $pdo->prepare("DELETE FROM pesanan WHERE id = ?");
            $stmt->execute([$id]);

            $pdo->commit();
            return true;
        } catch (\PDOException $e) {
            $pdo->rollBack();
            return false;
        }
    }
}
