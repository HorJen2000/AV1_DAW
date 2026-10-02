<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    $linhas = file("perguntas.txt");

    $arquivo = fopen("perguntas.txt", "w");

    foreach ($linhas as $linha) {

        $dados = explode(";", trim($linha));

        if ($dados[0] != $id) {
            
            fwrite($arquivo, $linha);
        }
    }
    fclose($arquivo);
}

$arquivo = fopen("perguntas.txt", "r");

$tabelaPerguntas = "";

fgets($arquivo);

    while(!feof($arquivo)) {
        $linha = fgets($arquivo);

        if ($linha != "") {
            $dados = explode(";", trim($linha));
            $id = $dados[0];
            $pergunta = $dados[1];
            $resposta1 = $dados[2];
            $resposta2 = $dados[3];
            $resposta3 = $dados[4];
            $correta = $dados[5];

            $tabelaPerguntas .= "<tr>";
            $tabelaPerguntas .= "<td>" . $id . "</td>";
            $tabelaPerguntas .= "<td>" . $pergunta . "</td>";
            $tabelaPerguntas .= "<td>" . $resposta1 . "</td>";
            $tabelaPerguntas .= "<td>" . $resposta2 . "</td>";
            $tabelaPerguntas .= "<td>" . $resposta3 . "</td>";
            $tabelaPerguntas .= "<td>" . $correta . "</td>";
            $tabelaPerguntas .= '<td><a href="alterarPergunta.php?id=' . $id . '">Alterar</a></td>';
            $tabelaPerguntas .= '<td><a href="excluirPergunta.php?id=' . $id . '">Excluir</a></td>';
            $tabelaPerguntas .= "</tr>";
        }
        fclose($arquivo);
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Pergunta</title>
</head>
<body>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Pergunta</th>
        <th>Resposta 1</th>
        <th>Resposta 2</th>
        <th>Resposta 3</th>
        <th>Correta</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>

    <?php echo $tabelaPerguntas; ?>
</table>

<a href="alterarPergunta.php?id=' . $dados[0] . '">Alterar</a>
<a href="excluirPergunta.php?id=' . $dados[0] . '">Excluir</a>
</body>
</html>