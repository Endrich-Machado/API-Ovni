<?php
require 'db_sistema1.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(['erro' => 'ID não informado']);
    exit;
}

$stmt = $pdo->prepare("DELETE FROM relatos WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(['mensagem' => 'Relato removido com sucesso']);
