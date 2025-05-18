<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $duracao = $_POST['duracao'];
    $valor = $_POST['valor'];
    $qtd = $_POST['qtd_ingresso'];

    $sql = "UPDATE filmes SET titulo = :titulo, descricao = :descricao, duracao = :duracao,
            valor_ingresso = :valor, qtd_ingresso = :qtd WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':duracao', $duracao);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':qtd', $qtd);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Filme atualizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar o filme.";
    }

    header("Location: ../frontend/index.php");
    exit;
}
?>
