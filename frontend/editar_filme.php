<?php
session_start();
require '../backend/conexao.php';

if (!isset($_GET['id'])) {
    $_SESSION['mensagem'] = "ID do filme não informado.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM filmes WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$filme = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$filme) {
    $_SESSION['mensagem'] = "Filme não encontrado.";
    header("Location: ../frontend/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Filme</title>
</head>
<body>
    <h1>Editar Filme</h1>

    <form action="../backend/atualizar_filmes.php" method="post">
        <input type="hidden" name="id" value="<?= $filme['id'] ?>">

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($filme['titulo']) ?>" required><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?= htmlspecialchars($filme['descricao']) ?></textarea><br>

        <label for="duracao">Duração (min):</label>
        <input type="number" name="duracao" id="duracao" value="<?= $filme['duracao'] ?>" required><br>

        <label for="valor">Valor do Ingresso (R$):</label>
        <input type="number" step="0.01" name="valor" id="valor" value="<?= $filme['valor_ingresso'] ?>" required><br>

        <label for="qtd_ingresso">Quantidade de Ingressos:</label>
        <input type="number" name="qtd_ingresso" id="qtd_ingresso" value="<?= $filme['qtd_ingresso'] ?>" required><br>

        <input type="submit" value="Atualizar">
    </form>

    <p><a href="index.php">Voltar</a></p>
</body>
</html>
