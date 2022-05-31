<?php

include_once "classes/quadrado.class.php";
$title = "Mostrar";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$cor = isset($_GET["cor"]) ? $_GET["cor"] : "";
$lado = isset($_GET["lado"]) ? $_GET["lado"] : "";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?></title>

    <style>
        .class{
            background: <?php echo $cor;?>;
            width: <?php echo $lado;?>px;
            height: <?php echo $lado;?>px;
            border: 2px solid;
        }
    </style>
</head>
<body>
    <?php
        $quad = new Quadrado($id, $lado, $cor);
        echo $quad;
    ?>
    <br>
    <div class="class"></div>

    <hr>
    <a href="listar.php">Voltar a lista</a>

</body>
</html>