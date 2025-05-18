<?php
session_start();
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM filmes WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Filme excluído com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir o filme.";
    }

    header("Location: ../frontend/index.php");
    exit;
}
?>
