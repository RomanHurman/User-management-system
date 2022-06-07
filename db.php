<?php
    $host = 'localhost';
    $db = 'user-bd';
    $user = 'root';
    $pass = '';
    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    } catch(PDOException $e) {
        echo 'Error connection with Db'. $e->getMessage();
    }

?>