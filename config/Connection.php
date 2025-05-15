<?php

namespace config;

require_once __DIR__ . '/../vendor/autoload.php';

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Connection
{
    public static function make(): PDO
    {
        try {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
            $dotenv->load();

            $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD']);

            $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";

            $pdo = new PDO(
                $dsn,
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
            
            return $pdo;
        } catch (PDOException $e){
            die('koneksi database gagal:'.$e->getMessage());
        }
    }
}