<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>
</head>
<body>
    <header>
        <h1>Cadastro de usuario</h1>
    </header>
    <main>
        <section>
            <article>
                <form action="../backend/salva_usuario.php" method="post">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" required> <br>

                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" id="senha" required> <br>

                    <p>Tipo de usuario:</p>
                    <input type="radio" name="tipo" id="admin" value="admin" required>
                    <label for="admin">admin</label>
                    
                    <input type="radio" name="tipo" id="cliente" value="cliente">
                    <label for="cliente">cliente</label> <br>

                    <input type="submit" value="salvar">
                </form>
                <p>
                    <a href="index.php">Voltar</a>
                </p>
            </article>
        </section>
    </main>
</body>
</html>