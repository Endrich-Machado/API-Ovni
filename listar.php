<?php
require './db_sistema1.php';

header('content-type: application/json');

//Consultar todos os relatos

$stmt = $pdo->query("SELECT * FROM relatos");
$relatos = $stmt->fetchALL(PDO::FETCH_ASSOC);

//retornar dados em formato jSON

echo json_encode($relatos);