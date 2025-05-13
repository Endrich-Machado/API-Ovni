<?php
require './db_sistema1.php';
header('Content-Type: application/json');

// Captura os dados da requisição
$dados = json_decode(file_get_contents("php://input"), true);

// Verifica se todos os dados obrigatórios foram enviados
if (!isset($dados['origem'], $dados['tipo'], $dados['descricao'], $dados['data_evento'], $dados['nivel_ameaca'])) {
    echo json_encode(['erro' => 'Dados faltando!']);
    exit;
}

// Preparar SQL para inserção
$stmt = $pdo->prepare("INSERT INTO relatos (origem, tipo, descricao, data_evento, nivel_ameaca) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([
    $dados['origem'],
    $dados['tipo'],
    $dados['descricao'],
    $dados['data_evento'],
    $dados['nivel_ameaca']
]);

echo json_encode(['mensagem' => 'Relato registrado com sucesso!']);
