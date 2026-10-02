<?php

$nome = "";
$email = "";
$senha = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["email"])) {

    $email = $_GET["email"];

    $linhas = file("usuarios.txt");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if (isset($dados[1]) && $dados[1] == $email) {

            $nome = $dados[0];
            $email = $dados[1];
            $senha = $dados[2];

            break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <h1>Alterar Usuário</h1>
    <form method="POST" action="atualizarUsuario.php">
        <input type="hidden" name="emailAntigo" value="<?php echo $email; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" value="<?php echo $senha; ?>" required>
        <br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>