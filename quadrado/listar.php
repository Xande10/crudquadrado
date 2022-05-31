<!DOCTYPE html>
<?php

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "acao/acao.php";
    require_once "classes/quadrado.class.php";

    $title = "Listar";
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
    $lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $buscar = isset($_POST['buscar']) ? $_POST['buscar'] : 0;

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title><?php echo $title ?></title>
        <script>
            function excluirRegistro(url){
                if (confirm("Confirma Exclusão?"))
                    location.href = url;
            }
        </script>
    </head>
    <body>
        <form method="post">
                <input type="radio" name="buscar" value="1" <?php if ($buscar == "1") echo "checked" ?>> Id<br>
                <input type="radio" name="buscar" value="2" <?php if ($buscar == "2") echo "checked" ?>> lado<br>
                <input type="radio" name="buscar" value="3" <?php if ($buscar == "3") echo "checked" ?>> Cor<br>
            <h3>Procurar Quadrado:</h3>
                <input type="text" name="procurar" id="procurar" size="25" value="<?php echo $procurar;?>">
            <br><br>
                <button name="acao" id="acao" type="submit" >Procurar</button>
            <br><br>
        </form>
        </fieldset>
    <hr>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col"> | #ID | </th>
                    <th scope="col"> | Lado | </th>
                    <th scope="col"> | Cor | </th>
                    <th scope="col"> | Mostrar | </th>
                    <th scope="col"> | Excluir | </th>
                    <th scope="col"> | Editar | </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $quad = new Quadrado("", "", "");
                $lista = $quad->listar($buscar, $procurar);
                foreach ($lista as $linha){ 
                ?>
                <tr>
                    <td scope="row"><?php echo $linha['id'];?></td>
                    <td scope="row"><?php echo $linha['lado'];?></td>
                    <td scope="row"><?php echo $linha['cor'];?></td>
                    <td scope="row"><a href="mostrar.php?lado=<?php echo $linha["lado"];?>&cor=<?php echo str_replace('#', '%23', $linha['cor']);?>">Mostrar quadrado</a></td>
                    <td scope="row"><?php echo "<a href=javascript:excluirRegistro('excluir.php?acao=excluir&id={$linha['id']}')>Excluir</a><br>"; ?></td>
                    <td scope="row"><a href="formulario.php?acao=editar&id=<?php echo $linha['id'];?>">Editar</a></td>
                </tr>
            <?php } ?> 
            </tbody>
        </table>
    </div>
    <hr>
    <a href="formulario.php">Voltar ao cadastro</a>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>