<?php
session_start();
require '..//backend/conexao.php';

// Buscar filmes do banco
$sql = "SELECT * FROM filmes";
$stmt = $conexao->query($sql);
$filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Filmes</title>
</head>
<body>
    <header>
        <h1>Catálogo de Filmes</h1>

        <?php if (isset($_SESSION['usuario'])): ?>
            <p>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?> (<?= $_SESSION['tipo'] ?>)</p>
            <a href="..//backend/logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </header>

    <main>
        <!-- Se for admin, pode cadastrar -->
        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin'): ?>
            <p><a href="cadastrar_filme.php">Cadastrar Novo Filme</a></p>
        <?php endif; ?>

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
                            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin'): ?>
                                <th>Ações (Admin)</th>
                            <?php elseif (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'cliente'): ?>
                                <th>Comprar</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filmes as $filme): ?>
                            <tr>
                                <td><?= htmlspecialchars($filme['titulo']) ?></td>
                                <td><?= htmlspecialchars($filme['descricao']) ?></td>
                                <td><?= $filme['duracao'] ?> min</td>
                                <td>R$ <?= number_format($filme['valor_ingresso'], 2, ',', '.') ?></td>
                                <td><?= $filme['qtd_ingresso'] ?></td>
                                
                                <!-- Ações de acordo com o tipo -->
                                <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'admin'): ?>
                                    <td>
                                        <a href="editar_filme.php?id=<?= $filme['id'] ?>">Editar</a> |
                                        <a href="..//backend/exluir_filme.php?id=<?= $filme['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este filme?')">Excluir</a>
                                    </td>
                                <?php elseif (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'cliente'): ?>
                                    <td>
                                        <a href="comprar_ingresso.php?id=<?= $filme['id'] ?>">Comprar</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum filme cadastrado.</p>
            <?php endif; ?>
        </section>

        <?php if (isset($_SESSION['mensagem'])): ?>
            <p><strong><?= $_SESSION['mensagem'] ?></strong></p>
            <?php unset($_SESSION['mensagem']); ?>
        <?php endif; ?>
    </main>
</body>
</html>
