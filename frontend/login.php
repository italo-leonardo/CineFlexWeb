<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php session_start(); ?>
    <?php if (isset($_SESSION['mensagem'])): ?>
        <p style="color:green"><?= $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></p>
    <?php endif; ?>

    <header>
        <h1>Tela de Login</h1>
    </header>
    <main>
        <section>
            <article>
                <form action="..//backend/logar.php" method="post">
                    <label for="usuario">Nome:</label>
                    <input type="text" name="usuario" id="usuario" required>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>

                    <input type="submit" value="Entrar">
                    
                </form>
                <p>Não tem uma conta? <a href="cadastro_usuario.php">Cadastre-se aqui</a></p>
            </article>
        </section>
    </main>
</body>
</html>