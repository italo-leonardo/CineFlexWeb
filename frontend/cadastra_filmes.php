<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes</title>
</head>
<body>
    <header>
        <h1>Cadastro de Filmes</h1>
    </header>
    <main>
        <section>
            <article>
                <form action="../backend/acoes.php" method="post">
                    <label for="titulo">Titulo: </label>
                    <input type="text" name="titulo" id="titulo" required><br>

                    <label for="descricao">Descrição: </label>
                    <textarea name="descricao" id="descricao"></textarea><br>

                    <label for="duracao">Duração (minutos): </label>
                    <input type="number" name="duracao" id="duracao" min="1" required><br>

                    <label for="valor">Valor do ingresso (R$): </label>
                    <input type="number" name="valor" id="valor" min="0" step="0.01" required><br>

                    <label for="qtd_ingresso">Quantidade de ingressos: </label>
                    <input type="number" name="qtd_ingresso" id="qtd_ingresso" min="1" required><br>

                    <input type="submit" value="Salvar">
                </form>
            </article>
            <p>
                <a href="index.php">Volta</a>
            </p>
        </section>
    </main>
</body>
</html>