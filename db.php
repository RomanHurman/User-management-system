<?php
    $host = 'localhost';
    $db = 'roman';
    $user = 'roman';
    $pass = 'V8p9U8d1';
    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    } catch(PDOException $e) {
        echo 'Error connection with Db'. $e->getMessage();
    }
?>