<?php
session_start();
require 'conexao.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $duracao = $_POST['duracao'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['qtd_ingresso'];

    $sql = "INSERT INTO filmes (titulo, descricao, duracao, valor_ingresso, qtd_ingresso) 
    VALUES (:titulo, :descricao, :duracao, :valor_ingresso, :qtd_ingresso)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':duracao', $duracao);
    $stmt->bindParam(':valor_ingresso', $valor);
    $stmt->bindParam(':qtd_ingresso', $quantidade);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Filmes Cadastrado com Sucesso!";
        header("Location: ../frontend/index.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao Cadastra Filme.";
        header("Location: ../index.php");
        exit;
    }

}


?>