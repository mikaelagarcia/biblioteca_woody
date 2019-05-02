<?php

require_once("conexao.php");
$conexao = conexaoBD();

session_start();

$botao = "inserir";



if(isset($_POST['btnGravarPromocao'])){

    $percentual = $_POST['txtPercentualPromocao'];
    $nomePromo = $_POST['txtNomePromocao'];

    if($_POST['btnGravarPromocao'] == 'inserir'){
        $sql = "INSERT INTO tbl_promocao (percentual, nome_promocao) VALUES ('".$percentual."','".$nomePromo."');";
    
    }
    mysqli_query($conexao, $sql);
    //echo($sql);
    header('location:cadastrarPromocao.php');
}

if(isset($_GET['modo'])){
    $modo = $_GET['modo'];

    if($modo == 'excluir'){
        $id = $_GET['id_promocao'];

        $sql = "DELETE FROM tbl_promocao WHERE id_promocao =".$id;

        mysqli_query($conexao, $sql);
        header('location:cadastrarPromocao.php');
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CMS Woody</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>

<header>
    <?php
        require_once("header.php");
    
    ?>
</header> 

<body>  
    <div id="sessaoAdmPromocao">
        <div id="seguraFormAdmPromocao">
            <form action="cadastrarPromocao.php" method="POST">
                <div id="tituloformPromocao">
                    <h3>Cadastro de Promoções</h3>
                </div>
                <div class="itemFormPromocao">
                    <p>Percentual: <input type="text" placeholder="Ex.: 20" name="txtPercentualPromocao" class="txtFormUsuario"></p>
                </div>
                <div class="itemFormPromocao">
                    <p>Nome da Promoção: <input type="text" name="txtNomePromocao" class="txtFormUsuario"></p>
                </div>
                <div class="itemFormPromocao" style="height:40px;">
                    <input type="submit" value="<?php echo($botao)?>" name="btnGravarPromocao" id="btnGravarPromocao">
                </div>
                <!-- ******************LISTA QUE SERA CARREGADA***************** -->
                <div id="listaCadPromocao">
                    <div class="itemCadPromocao">
                        Percentual
                    </div>
                    <div class="itemCadPromocao">
                        Nome Promo
                    </div>
                    <div class="itemCadPromocao">
                        Opções
                    </div>
                    <!-- *****************LISTA SERA CARREGADA ASSIM****** -->
                    <?php
                    
                        $sql = "SELECT * FROM tbl_promocao ORDER BY id_promocao DESC";
                        $select = mysqli_query($conexao,$sql);

                        while($rsPromocao = mysqli_fetch_array($select)){
                        
                    ?>
                    
                    <div class="carregarCadPromocao">
                        <p><?php echo($rsPromocao['percentual'])?></p>
                    </div>
                    <div class="carregarCadPromocao">
                        <p><?php echo($rsPromocao['nome_promocao'])?></p>
                    </div>
                    <div class="carregarCadPromocao">
                        <a href="#">
                            <img src="" alt="status">
                        </a>
                        <a href="#">
                            <img src="icons/edit.png.png" alt="editar">
                        </a>
                        <a href="cadastrarPromocao.php?modo=excluir&id_promocao=<?php echo($rsPromocao['id_promocao'])?>">
                            <img src="icons/delete.png" alt="excluir">
                        </a>

                    </div>
                    <?php 
                    }   
                    ?>

                </div>
            </form>
        </div>
    </div>







</body>

<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>