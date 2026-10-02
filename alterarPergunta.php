<?php

$id = $pergunta = $resposta1 = $resposta2 = $resposta3 = $correta = "";
$dados = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {

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

        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    $pergunta = $_POST['pergunta'];
    $resposta1 = $_POST['resposta1'];
    $resposta2 = $_POST['resposta2'];
    $resposta3 = $_POST['resposta3'];
    $correta = $_POST['correta'];

    $linhas = file('perguntas.txt');

    $arquivo = fopen('perguntas.txt', 'w');

foreach ($linhas as $linha) {
    
    $dados = explode(";", trim($linha));
    
    if ($dados[0] == $id) {
        
    $novaLinha = $id . ";" .
             $pergunta . ";" .
             $resposta1 . ";" .
             $resposta2 . ";" .
             $resposta3 . ";" .
             $correta . "\n";

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
    <title>Alterar Pergunta</title>
</head>
<body>
    
    <form method="POST">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        Pergunta:
        <input type="text" name="pergunta" value="<?php echo $pergunta; ?>"><br>

        Resposta 1:
        <input type="text" name="resposta1" value="<?php echo $resposta1; ?>"><br>

        Resposta 2:
        <input type="text" name="resposta2" value="<?php echo $resposta2; ?>"><br>

        Resposta 3:
        <input type="text" name="resposta3" value="<?php echo $resposta3; ?>"><br>

        Resposta Correta (1, 2 ou 3):
        <input type="number" name="correta" value="<?php echo $correta; ?>" min="1" max="3"><br>

        <input type="submit" value="Alterar Pergunta">
    </form>

</body>
</html>

