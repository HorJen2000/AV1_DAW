<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"])) {

    $email = $_GET["email"];

    $linhas = file("usuarios.txt");

    $arquivo = fopen("usuarios.txt", "w");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if ($dados[1] != $email) {

            fwrite($arquivo, $linha);

        }

    }
    fclose($arquivo);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
</head>
<body>
    
    <h1>Usuário excluído com sucesso!</h1>

    <a href="listarUsuarios.php">Voltar para a lista de usuários</a>
    
</body>
</html>