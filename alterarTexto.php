<?php

$id = "";
$pergunta = "";
$resposta = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $linhas = file("perguntasTexto.txt");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if ($dados[0] == $id) {

            $pergunta = $dados[1];
            $resposta = $dados[2];

        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta</title>
</head>
<body>
    <h1>Alterar Pergunta</h1>
    <form method="post" action="atualizarPergunta.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" value="<?php echo $pergunta; ?>" required><br><br>
        <label for="resposta">Resposta:</label>
        <input type="text" id="resposta" name="resposta" value="<?php echo $resposta; ?>" required><br><br>
        <input type="submit" value="Atualizar Pergunta">
    </form>
</body>
</html>