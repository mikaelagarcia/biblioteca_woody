<?php
// criando variaveis para fazer conexão com o banco
    require_once('conexao.php');
    session_start();
    // criando modo deletar do fale conosco
    if(isset($_GET['modo'])){
        $modo = $_GET["modo"];
    
        if($modo == 'excluir'){
            $codigo = $_GET["id"];
            $sql = "DELETE FROM tbl_faleconosco WHERE id_fc =".$codigo;
            mysqli_query($conexao, $sql);
            header('location:index.php?page=index.php');    

            
        }
    }

    if(isset($_GET['page'])){
        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CMS Woody</title>
    <link rel="stylesheet" href="css/style.css"/>
    
</head>

<!-- *******************************CABEÇALHO*********************** -->

<header>
    <?php
        require_once("header.php");
    
    ?>
</header> 

<!-- *******************************CONTEUDO PRINCIPAL*********************** -->

<body>
    <div id="conteudoPrincipal">
        <div  id="admInicial">
            <h2>Bem a vindo ao CMS - Sistema de Gerenciamento do Site</h2>
        </div>
    </div>
</body>

<!-- *******************************FOOTER*********************** -->

<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    

</html>