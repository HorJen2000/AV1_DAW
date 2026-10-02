<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    $linhas = file("perguntasTexto.txt");

    $arquivo = fopen("perguntasTexto.txt", "w");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if ($dados[0] == $id) {

            $novaLinha = $id . ";" . $pergunta . ";" . $resposta . "\n";

            fwrite($arquivo, $novaLinha);

        } else {

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
    <title>Atualizar Pergunta</title>
</head>
<body>
    <h1>Pergunta Atualizada com Sucesso!</h1>
    <p>A pergunta foi atualizada com sucesso.</p>
</body>
</html>