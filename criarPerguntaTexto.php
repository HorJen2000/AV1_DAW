<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    $arquivo = fopen("perguntasTexto.txt", "a");

    $novaLinha = $id . ";" . $pergunta . ";" . $resposta . "\n";

    fwrite($arquivo, $novaLinha);

    fclose($arquivo);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Pergunta</title>
</head>
<body>
    <h1>Criar Pergunta</h1>
    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" required><br><br>

        <label for="resposta">Resposta:</label>
        <input type="text" id="resposta" name="resposta" required><br><br>

        <input type="submit" value="Criar Pergunta">
    </form>
</body>
</html>