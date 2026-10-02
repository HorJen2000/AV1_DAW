<?php

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $linhas = file("perguntas.txt");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if ($dados[0] == $id) {

            $pergunta = $dados[1];
            $resposta1 = $dados[2];
            $resposta2 = $dados[3];
            $resposta3 = $dados[4];
            $correta = $dados[5];

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
    <title>Listar uma Pergunta</title>
</head>
<body>
<h1>Visualizar Pergunta</h1>

<p>ID: <?php echo $id; ?></p>

<p>Pergunta: <?php echo $pergunta; ?></p>

<p>Resposta 1: <?php echo $resposta1; ?></p>

<p>Resposta 2: <?php echo $resposta2; ?></p>

<p>Resposta 3: <?php echo $resposta3; ?></p>

<p>Resposta Correta: <?php echo $correta; ?></p>
</body>
</html>