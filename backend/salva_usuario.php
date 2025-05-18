<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO usuario (nome, senha, tipo) VALUES (:nome, :senha, :tipo)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo', $tipo);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
        header("Location: ../frontend/login.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar usuário.";
        header("Location: ../frontend/login.php");
        exit;
    }
}
?>
