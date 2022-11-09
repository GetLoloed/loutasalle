<?php
// Connect to database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=loutasalle;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}