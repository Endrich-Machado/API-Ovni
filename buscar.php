<?php

require 'db_sistema1.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(['erro' => 'ID não informado']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM relatos WHERE id = ?");
$stmt->execute([$id]);
$relato = $stmt->fetch(PDO::FETCH_ASSOC);

if ($relato) {
    echo json_encode($relato);
} else {
    echo json_encode(['erro' => 'Relato não encontrado']);
}