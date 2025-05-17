<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Tela de Login</h1>
    </header>
    <main>
        <section>
            <article>
                <form action="logar.php" method="post">
                    <label for="usuario">Nome:</label>
                    <input type="text" name="usuario" id="usuario" required>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>

                    <input type="submit" value="Entrar">
                    
                </form>
                <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
            </article>
        </section>
    </main>
</body>
</html>