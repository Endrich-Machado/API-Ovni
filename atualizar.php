<?php
require './db_sistema1.php';
header('Content-Type: application/json');

$id = $_GET['id'] ?? null;
$dados = json_decode(file_get_contents("php://input"), true);

if (!$id || !$dados) {
    echo json_encode(['erro' => 'Dados ou ID ausentes']);
    exit;
}

$stmt = $pdo->prepare("UPDATE relatos SET origem = ?, tipo = ?, descricao = ?, data_evento = ?, nivel_ameaca = ? WHERE id = ?");
$stmt->execute([
    $dados['origem'],
    $dados['tipo'],
    $dados['descricao'],
    $dados['data_evento'],
    $dados['nivel_ameaca'],
    $id
]);

if ($stmt->rowCount() > 0) {
    echo json_encode(['mensagem' => 'Atualizado com sucesso!']);
} else {
    echo json_encode(['mensagem' => 'Nenhum registro foi alterado.']);
}
