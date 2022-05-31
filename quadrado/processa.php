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
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
        if ($acao == "salvar"){
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            if ($id == 0){
                $quad = new Quadrado("", $_POST['lado'], $_POST['cor']);      
                $resultado = $quad->salvar();
                header("location:listar.php");
            }else {
                $quad = new Quadrado($_POST['id'], $_POST['lado'], $_POST['cor']);
                $resultado = $quad->editar();
            }    
            header("location:listar.php");  
        }
        function buscarDados($id){
            $pdo = Conexao::getInstance();
            $consulta = $pdo->query("SELECT * FROM atividade1005.Quadrado WHERE id = $id");
            $dados = array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $dados['id'] = $linha['id'];
                $dados['lado'] = $linha['lado'];
                $dados['cor'] = $linha['cor'];
            }
            return $dados;
        }
    
    ?>
    <br>
    <div class="class"></div>

</body>
</html>