<?php
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emailAntigo = $_POST["emailAntigo"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];



    $linhas = file("usuarios.txt");

    $arquivo = fopen("usuarios.txt", "w");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if ($dados[1] == $emailAntigo) {

                    
            $novaLinha = $nome . ";" .
                        $email . ";" .
                        $senha . "\n";

            fwrite($arquivo, $novaLinha);

        } else {

            fwrite($arquivo, $linha);
        }
    }    
        
    fclose($arquivo);

$mensagem = "Usuário atualizado com sucesso!";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário</title>
</head>
<body>

<body>

    <h1>Usuário atualizado com sucesso!</h1>

    <p>Os dados do usuário foram alterados.</p>

    <a href="listarUsuarios.php">Voltar para a lista de usuários</a>

<?php

if ($mensagem != "") {echo "<h1>" . $mensagem . "</h1>";}?>

</body>

</body>
</html>