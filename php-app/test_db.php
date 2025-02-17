<?php
$pdo = new PDO("mysql:host=mariadb_container;dbname=sample;charset=utf8", "sampleuser", "samplepass");
$stmt = $pdo->query("SHOW TABLES");
var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
