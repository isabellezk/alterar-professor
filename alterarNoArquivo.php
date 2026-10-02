<?php
    $msg = "";
    $mat = "";
    $nome = "";
    $cpf = "";
    $endereco = "";
    $novoArquivo = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $mat = $_POST['mat'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];

        $arq = fopen("professor.txt", "r") or die("erro ao abrir arquivo");

        while(($linha=fgets($arq)) != false){
            $colunaDados = explode(";", $linha);

            if($colunaDados[0] == $mat){
                $linha = $mat . ";" . $nome . ";" . $cpf . ";" . $endereco . "\n";
            }
            
            $novoArquivo = $novoArquivo . $linha;
        }

        fclose($arq);

        $arq = fopen("professor.txt", "w") or die("erro ao abrir arquivo");
        fwrite($arq, $novoArquivo);
        fclose($arq);

        $msg = "Deu tudo certo!!";
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

    <?php echo $msg ?>
</body>
</html>
