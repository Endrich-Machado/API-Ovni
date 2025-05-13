<?php
require 'db_sistema1.php';

// SQL para criar a tabela se não existir
$sql = "
CREATE TABLE IF NOT EXISTS relatos (
    id SERIAL PRIMARY KEY,
    origem VARCHAR(50),
    tipo VARCHAR(50),
    descricao TEXT,
    data_evento DATE,
    nivel_ameaca VARCHAR(10) CHECK (nivel_ameaca IN ('baixo', 'médio', 'alto')),
    registrado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

try {
    $pdo->exec($sql);
    echo "Tabela 'relatos' verificada/criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabela: " . $e->getMessage();
}