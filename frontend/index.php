<?php 
session_start();
require '../backend/conexao.php';

$sql = "SELECT * FROM filmes";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineFlow</title>
</head>
<body>
    <?php
        if (isset($_SESSION['mensagem'])) {
            echo "<p>" . $_SESSION['mensagem'] . "</p>";
            unset($_SESSION['mensagem']);
        }
    ?>
    <header>
        <h1>CineFlow</h1>
        <nav>
            <a href="login.php">Login</a>
            <a href="cadastra_filmes.php">Cadastro de Filmes</a>
        </nav>
    </header>

    <main>
        <section>
            <?php if (count($filmes) > 0): ?>
                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Duração</th>
                            <th>Valor Ingresso</th>
                            <th>Qtd. Ingressos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filmes as $filme): ?>
                            <tr>
                                <td><?= htmlspecialchars($filme['titulo'])?></td>
                                <td><?= htmlspecialchars($filme['descricao']) ?></td>
                                <td><?= $filme['duracao'] ?> min</td>
                                <td>R$ <?= number_format($filme['valor_ingresso'], 2, ',', '.') ?></td>
                                <td><?= $filme['qtd_ingresso'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <p>Nenhum filme cadastrado.</p>
                <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; CineFlow - TDE 3</p>
    </footer>
</body>
</html>
