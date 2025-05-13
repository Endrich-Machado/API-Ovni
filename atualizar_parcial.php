<?php
require './db_sistema1.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? null;
$dados = json_decode(file_get_contents("php://input"), true);

if (!$id || !$dados || !is_array($dados)) {
    echo json_encode(['erro' => 'ID ou dados inválidos']);
    exit;
}

// Montar a SQL dinamicamente
$campos = [];
$valores = [];

foreach ($dados as $campo => $valor) {
    $campos[] = "$campo = ?";
    $valores[] = $valor;
}

$valores[] = $id;

$sql = "UPDATE relatos SET " . implode(', ', $campos) . " WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute($valores);

if ($stmt->rowCount() > 0) {
    echo json_encode(['mensagem' => 'Atualização parcial feita com sucesso!']);
} else {
    echo json_encode(['mensagem' => 'Nada foi alterado.']);
}
