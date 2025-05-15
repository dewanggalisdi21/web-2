<?php

namespace models;

require __DIR__ . '/../vendor/autoload.php';

use config\Connection;
use PDO;

class Jenis_produk
{
    public static function all()
    {
        $pdo = Connection::make();
        $stmt = $pdo->query("SELECT * FROM jenis_produk");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("SELECT * FROM jenis_produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function store($data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("INSERT INTO jenis_produk (nama, deskripsi) VALUES (?, ?)");
        return $stmt->execute([$data['nama'], $data['deskripsi']]);
    }

    public static function update($id, $data)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("UPDATE jenis_produk SET nama = ?, deskripsi = ? WHERE id = ?");
        return $stmt->execute([$data['nama'], $data['deskripsi'], $id]);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $stmt = $pdo->prepare("DELETE FROM jenis_produk WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
