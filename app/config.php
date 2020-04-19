<?php
    //Подключение к БД

    $host = 'localhost';
    $db = 'itcompany';
    $user = 'Thomd209';
    $pass = 'Webcreater210299';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;port=3307;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);
?>