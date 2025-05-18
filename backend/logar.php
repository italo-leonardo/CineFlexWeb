<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['usuario'];
    $senhaDigitada = $_POST['senha'];

    // Busca o usuário pelo nome
    $sql = "SELECT * FROM usuario WHERE nome = :nome LIMIT 1";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senhaDigitada, $usuario['senha'])) {
        // Login bem-sucedido
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['tipo'] = $usuario['tipo'];
        $_SESSION['mensagem'] = "Bem-vindo, " . $usuario['nome'] . "!";

        header("Location: ../frontend/index.php");
        exit;
    } else {
        // Falha no login
        $_SESSION['mensagem'] = "Usuário ou senha incorretos!";
        header("Location: ../frontend/login.php");
        exit;
    }
}
?>
