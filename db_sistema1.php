<?php

$host = 'db.bzgpdtclcnzwvwpzaoxj.supabase.co';
$db = 'postgres';
$user = 'postgres';
$pass = '714026Ce@';




try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}