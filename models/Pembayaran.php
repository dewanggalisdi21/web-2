<?php

namespace models;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

use config\Connection;
use PDO;

class Pembayaran
{
    public static function all()
    {
        $pdo = Connection::make();
        $stmt = $pdo->query("
            SELECT pb.*, pg.nama AS nama_pegawai, p.tanggal AS tanggal_pesanan
            FROM pembayaran pb
            JOIN pesanan p ON pb.pesanan_id = p.id
            JOIN anggota a ON p.anggota_id = a.id
            JOIN pegawai pg ON a.pegawai_id = pg.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("SELECT * FROM pembayaran WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("INSERT INTO pembayaran (jumlah_bayar, tanggal, pesanan_id) VALUES (?, ?, ?)");
        return $stmt->execute([
            $data['jumlah_bayar'],
            $data['tanggal'],
            $data['pesanan_id']
        ]);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("UPDATE pembayaran SET jumlah_bayar = ?, tanggal = ?, pesanan_id = ? WHERE id = ?");
        return $stmt->execute([
            $data['jumlah_bayar'],
            $data['tanggal'],
            $data['pesanan_id'],
            $id
        ]);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("DELETE FROM pembayaran WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
