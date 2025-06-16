<?php

namespace Blog\Model;

use PDOException;

class ContactModel extends Database
{
    public function writeContactData($values)
    {
        $guid = $this->createUUID();

        $sql = "INSERT INTO contact (`id`, `name`, `email`, `content`) VALUES (
            :guid, :name, :email, :content);";

        $pdo = $this->linkDB();

        try {
            $sth = $pdo->prepare($sql);
            $sth->execute(array(":guid" => $guid,
                ":name" => $values["name"],
                ":email" => $values["email"],
                ":content" => $values["content"]));
        } catch (PDOException $e) {
            new \Blog\Library\ErrorMsg("Fehler beim Schreiben der Daten.", $e); 
            die;
        }
                
        return true;
    }
}