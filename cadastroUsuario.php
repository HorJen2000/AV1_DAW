<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $arquivo = fopen("usuarios.txt", "a");

    $novaLinha = $nome . ";" .
                 $email . ";" .
                 $senha . "\n";

    fwrite($arquivo, $novaLinha);

    fclose($arquivo);

    $mensagem = "Usuário cadastrado com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
</head>

<body>

    <h1>Cadastro Usuário</h1>

    <?php
    if (isset($mensagem)) {
        echo "<p>" . $mensagem . "</p>";
    }
    ?>

    <form method="POST">

        Nome:
        <input type="text" name="nome" required>
        <br>

        Email:
        <input type="email" name="email" required>
        <br>

        Senha:
        <input type="password" name="senha" required>
        <br>

        <input type="submit" value="Cadastrar Usuário">

    </form>

    <br>

    <a href="listarUsuarios.php">Listar Usuários</a>

</body>

</html>