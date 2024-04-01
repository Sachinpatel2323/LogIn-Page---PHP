<?php

    $hostname = 'localhost';
    $dbname = 'php_login_signup';
    $username = 'root';
    $password = '';

    $dsn = "mysql:host=$hostname;dbname=$dbname";

    try {
        
        $connection = new PDO($dsn,$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "error : ".$e->getMessage();
    }