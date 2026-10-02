<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $resposta1 = $_POST["resposta1"];
    $resposta2 = $_POST["resposta2"];
    $resposta3 = $_POST["resposta3"];
    $correta = $_POST["correta"];

    $arquivo = fopen("perguntas.txt", "a");

        
    $arquivo = fopen("perguntas.txt", "a");

    $novaLinha = $id . ";" .
                $pergunta . ";" . 
                $resposta1 . ";" . 
                $resposta2 . ";" . 
                $resposta3 . ";" . 
                $correta . "\n";

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


    <form method="POST">

        ID:
        <input type="number" name="id"><br>

        Pergunta:
        <input type="text" name="pergunta"><br>

        Resposta 1:
        <input type="text" name="resposta1"><br>

        Resposta 2:
        <input type="text" name="resposta2"><br>

        Resposta 3:
        <input type="text" name="resposta3"><br>

        Resposta Correta:
        
        <input type="number" name="correta" min="1" max="3"><br>
        
        <input type="submit" value="Criar Pergunta">

    </form>


</body>
</html>