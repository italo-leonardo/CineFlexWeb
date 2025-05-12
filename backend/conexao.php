<?php 
    $servidor = "localhost";
    $user = "root";
    $senha = "";
    $banco = "cinema";

    try {
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8mb4", $user, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        die ("Conexao falhou: " . $e->getMessage());
    }



?>