<?php

namespace AutovermietungPHP\Model\Car;

use AutovermietungPHP\Database\Database;
use PDOException;

class Car extends Database
{
    public function getAllCars(): ?array
    {
        $sql = "SELECT * FROM car";
        $pdo = $this->linkDB();

        try {
            $sth = $pdo->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll();
            return $result;
        } catch (PDOException $e) {
            // return "TEST";
        }

        // return true;
    }
}