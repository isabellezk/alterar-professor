<?php
    $msg = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mat = $_POST['matricula'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];

        $arq = fopen("professor.txt","r") or die("Erro ao abrir arquivo");
        $arq2 = fopen("profTemp.txt","w") or die("Erro ao criar arquivo");

        while(($linha=fgets($arq))!==false)
        {
            $colunaDados = explode(";", $linha);

            if(trim($colunaDados[2]) != $mat) {
                fprintf($arq2, "%s",$linha);
            }
            else {
                fprintf($arq2, "%s;%s;%s;%ss\n",$mat,$nome,$cpf,$endereco);
            }
        }

        fclose($arq);
        fclose($arq2);

        $arq = fopen("professor.txt","w") or die("Erro ao abrir arquivo");
        $arq2 = fopen("profTemp.txt","r") or die("Erro ao criar arquivo");

        while(($linha=fgets($arq2))!==false)
        {
            fprintf($arq, "%s",$linha);
        }

        fclose($arq);
        fclose($arq2);

        $msg = "Deu certo";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Professor</title>
</head>
<body>
<h1>Alterar Professor</h1>
<br>
<form action="alterarProfessor.php" method="POST">
    Matrícula: <input type="number" name="matricula" id="matricula" value="<?php echo $matricula ?>">
    <br><br>

    Nome: <input type="text" name="nome" id="nome" value="<?php echo $nome ?>">
    <br><br>

    CPF: <input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>">
    <br><br>

    Endereço: <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>">
    <br><br>

    <input type="submit" value="Alterar Professor">
</form>

<p><?php echo $msg ?></p>
<br>
</body>
</html>
