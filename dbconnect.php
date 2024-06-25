<?php

function getPDOConnexion(){


    $host = "127.0.0.1";
    $port = "3306";
    // database
    $db = "repertoire";
    $user = "root";
    // password
    $pwd = "";
    // encodage
    $charset = 'utf8mb4';
    // data source name
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

    $options = [
        // si au lancement il y'a un erreur, il affichera l'erreur 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // retourne le resultat sous forme de tableau associatif de la base de données 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // permet de d"utilisé des requette native de la base de données , cela permet de renforcé la securité surtout contre les injection sql, et octoire de meilleur performance
        PDO::ATTR_EMULATE_PREPARES => False,
    ];


    // bloc try catch, il tente de crée l'instance avec les informations fournis et en cas d'echec , il affichera le message d'erreur 
    try {
        // J'instancie et crée ma connection a la bdd
       return $pdo = new PDO($dsn, $user, $pwd, $options);
        // echo "Connexion réussie à la base de donnée";
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}
