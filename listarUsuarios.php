<?php

$arquivo = fopen("usuarios.txt", "r");
$tabelaUsuarios = "";

// Pula o cabeçalho
fgets($arquivo);

while (($linha = fgets($arquivo)) !== false) {

    $dados = explode(";", trim($linha));

    $nome = $dados[0];
    $email = $dados[1];
    $senha = $dados[2];

    $tabelaUsuarios .= "<tr>";

    $tabelaUsuarios .= "<td>" . $nome . "</td>";
    $tabelaUsuarios .= "<td>" . $email . "</td>";
    $tabelaUsuarios .= "<td>" . $senha . "</td>";

    $tabelaUsuarios .= '<td>
        <a href="alterarUsuario.php?email=' . $email . '">Alterar</a>
    </td>';

    $tabelaUsuarios .= '<td>
        <a href="excluirUsuario.php?email=' . $email . '">Excluir</a>
    </td>';

    $tabelaUsuarios .= "</tr>";
}

fclose($arquivo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>

    <h1>Lista de Usuários</h1>

    <table border="1">

        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>

        <?php echo $tabelaUsuarios; ?>

    </table>

</body>
</html>