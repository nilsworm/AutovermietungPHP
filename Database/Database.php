<?php

namespace AutovermietungPHP\Database;

use Exception;
use PDO;
use PDOException;

abstract class Database
{


    /**
     * Stellt eine Verbindung zur Datenbank her
     * 
     * @return PDO Gibt eine Datenbankverbindung zurueck
     */
    public function linkDB(): PDO
    {
        try {
            $dbname = $_ENV['DB_NAME'];
            $dbhost = $_ENV['DB_HOST'];
            $user = $_ENV['DB_USER'];
            $pw = $_ENV['DB_PASSWORD'];
            $pdo = new PDO(
                "mysql:dbname=$dbname;host=$dbhost"
                ,
                $user
                ,
                $pw
                ,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            return $pdo;
        } catch (PDOException $e) {
            throw new Exception("");
        }
    }


    /**
     * Zum serverseitigen generieren einer UUID
     * 
     * @return string Liefert eine UUID
     */
    public function createUUID(): string
    {
        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}