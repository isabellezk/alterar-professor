<?php
    $mat = "";
    $nome = "";
    $cpf = "";
    $endereco = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['mat'])){
        $mat = $_GET['mat'];

        $arq = fopen("professor.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){

            $colunaDados = explode(";", $linha);

            if($colunaDados[0] == $mat){
                $nome = $colunaDados[1];
                $cpf = $colunaDados[2];
                $endereco = $colunaDados[3];
                break;
            }
        }

        fclose($arq);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Professor</title>
</head>
<body>
    <h1>Alterar Professor</h1>

    <form action="alterarNoArquivo.php" method="POST">
        Matrícula: <input type="number" name="mat" value="<?php echo $mat ?>">
        <br><br>
        Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
        <br><br>
        CPF: <input type="number" name="cpf" value="<?php echo $cpf ?>">
        <br><br>
        Endereço: <input type="text" name="endereco" value="<?php echo $endereco ?>">
        <br><br>

        <input type="submit" value="Alterar professor">
    </form>
</body>
</html>
