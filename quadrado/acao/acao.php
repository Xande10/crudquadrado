<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../quadrado/classes/quadrado.class.php";

    $acao = "";
    if(isset($_POST['acao'])){$acao = $_POST['acao'];}else if(isset($_GET['acao'])){$acao = $_GET['acao'];}
        
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        
        $quad = new Quadrado("", "", "");
        $resultado = $quad->excluir($id);
        header("location:../listar.php");
    }

    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
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