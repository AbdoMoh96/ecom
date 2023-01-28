<?php

namespace core\connection;

use PDO;

class DB
{
    private static $instance;

    public static function query($query, $mode = 'get', $args = [])
    {
        $stmt = self::$instance->prepare($query);
        $stmt->execute($args);


        if ($mode === 'get') {
            return $stmt->fetchAll();
        } else {
            return $stmt->fetch();
        }
    }

    public static function queryVoid($query, $args = [])
    {
        $stmt = self::$instance->prepare($query);
        $stmt->execute($args);
    }

    public static function insertGetId($query, $args = []): int
    {
        $stmt = self::$instance->prepare($query);
        $stmt->execute($args);
        return intval(self::$instance->lastInsertId());
    }

    public function connect(): PDO
    {
        $driver = $_ENV['DB_CONNECTION'];
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];
        $dsn = "$driver:host=$host;port=$port;dbname=$db;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        if (!self::$instance) {
            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
                self::$instance = $pdo;
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        //dd(self::$instance->query('select * from product_types')->fetchAll()); // temp
        return self::$instance;
    }

}