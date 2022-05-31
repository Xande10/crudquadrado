<?php

include_once "acao/acao.php";

$title = "Formulário";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        $dados;
        if ($acao == 'editar'){
            $id = isset($_GET['id']) ? $_GET['id'] : "";
                if ($id > 0)
                    $dados = buscarDados($id);
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title><?php $title ?></title>
    </head>
    <body>
        <fieldset>
            <h1>Cadastro de um quadrado</h1>
            <form method="post" action="processa.php">
                <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados['id']; else echo 0; ?>">    
                <p>Lado:</p>
                    <input require="true" type="text" name="lado" id="lado" placeholder="Digite o tamanho do lado" value="<?php if ($acao == "editar") echo $dados['lado'];?>">
                    <br>
                <p>Cor:</p>
                    <input required="true" name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" value="<?php if ($acao == "editar") echo $dados['cor'];?>" >
                    <br>         
                <br>
                <hr>
                <br>
                    <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br>
            <hr>
            <a href="listar.php">Listar</a>
        </fieldset>
    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>