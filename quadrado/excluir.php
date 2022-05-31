<?php

    include_once "classes/quadrado.class.php";
    $title = "Processa";
    $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
    $lado = isset($_POST["lado"]) ? $_POST["lado"] : "";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?php echo $title; ?></title>
    </head>
    <body>
        <?php
            $id = isset($_GET['id']) ? $_GET['id'] : 0;
            
            $quad = new Quadrado("", "", "");
            $resultado = $quad->excluir($id);
            header("location:listar.php");
        ?>
        <br>
        <div class="class"></div>
    </body>
</html>