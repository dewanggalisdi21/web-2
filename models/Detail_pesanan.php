<?php

namespace models;

require_once __DIR__ . '/../vendor/autoload.php';

use config\Connection;
use PDO;

class Detail_pesanan
{
    public static function all($pesanan_id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("
            SELECT dp.*, p.nama, p.harga 
            FROM detail_pesanan dp
            JOIN produk p ON dp.produk_id = p.id
            WHERE dp.pesanan_id = ?
        ");
        $stmt->execute([$pesanan_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function store($pesanan_id, $produk_id, $jumlah)
    {
        if (empty($pesanan_id) || empty($produk_id) || empty($jumlah)) {
            return false;
        }

        $pdo = Connection::make();
        $stmt = $pdo->prepare("
            INSERT INTO detail_pesanan (pesanan_id, produk_id, jumlah)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$pesanan_id, $produk_id, $jumlah]);
    }

    public static function deleteByPesanan($pesanan_id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("DELETE FROM detail_pesanan WHERE pesanan_id = ?");
        return $stmt->execute([$pesanan_id]);
    }

    public static function delete($pesanan_id, $produk_id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("DELETE FROM detail_pesanan WHERE pesanan_id = ? AND produk_id = ?");
        return $stmt->execute([$pesanan_id, $produk_id]);
    }
}
