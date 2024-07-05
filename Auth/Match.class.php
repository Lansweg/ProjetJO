<?php

require_once 'MyDbConnection.php';

class Rencontre {

    public static function getAllMatchPlayed() {
        $pdo = MyDbConnection::getInstance(); 
        $stmt = $pdo->prepare('SELECT * FROM rencontre WHERE endrencontre = 1');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public static function getAllColor(){
    //     $pdo = MyDbConnection::getInstance();
    //     $stmt = $pdo->prepare('SELECT * FROM equipe WHERE couleurEquipe = ?');
    //     $stmt->execute();
    // }


    public static function getStartMatch() {
        $pdo = MyDbConnection::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM rencontre WHERE endrencontre = 0');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
