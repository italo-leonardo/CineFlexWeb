<?php
session_start();
require 'conexao.php';

// Verifica se está logado e é cliente
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'cliente') {
    $_SESSION['mensagem'] = "Acesso negado. Apenas clientes podem comprar ingressos.";
    header("Location: ../frontend/index.php");
    exit;
}

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = "Filme inválido.";
    header("Location: ../frontend/index.php");
    exit;
}

$id = $_GET['id'];

// Buscar dados do filme
$sql = "SELECT * FROM filmes WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
    $_SESSION['mensagem'] = "Filme não encontrado.";
    header("Location: ../frontend/index.php");
    exit;
}

// Verifica se ainda há ingressos
if ($filme['qtd_ingresso'] <= 0) {
    $_SESSION['mensagem'] = "Ingressos esgotados para este filme.";
    header("Location: ../frontend/index.php");
    exit;
}

// Reduz 1 ingresso
$sql_update = "UPDATE filmes SET qtd_ingresso = qtd_ingresso - 1 WHERE id = :id";
$stmt_update = $conexao->prepare($sql_update);
$stmt_update->bindParam(':id', $id);

if ($stmt_update->execute()) {
    $_SESSION['mensagem'] = "Ingresso comprado com sucesso!";
} else {
    $_SESSION['mensagem'] = "Erro ao processar compra.";
}

header("Location: ../frontend/index.php");
exit;
