<?php

function povezi(){
    $host = "localhost"; 
    //ime baze
    $db   = "polanicl"; 
    $user = "polanicl"; 
    $pass = "hn2gJ3Hx"; 
    $charset = "utf8";
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    return $pdo;

}

?>