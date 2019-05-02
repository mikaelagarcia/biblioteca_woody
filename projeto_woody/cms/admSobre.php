<?php

require_once('conexao.php');
session_start();


$conexao = conexaoBD();
$botao = "inserir";
$textoSobre = "";

if(isset($_GET['valorStatus'])){
    $status = $_GET['valorStatus'];
    $id = $_GET['id_sobre'];

    $sql = "UPDATE tbl_sobre SET status= 0";
    mysqli_query($conexao, $sql);

    $sql = "UPDATE tbl_sobre SET status = 1 WHERE id_sobre =".$id;
    mysqli_query($conexao, $sql);
}


if(isset($_POST['btnGravarSobre'])){

    $textSobre = $_POST['txtAreaSobre'];

    if($_POST['btnGravarSobre'] == 'inserir'){
        $sql = "INSERT INTO tbl_sobre (texto_1) VALUES ('".$textSobre."');";

    }else if($_POST['btnGravarSobre'] == "editar"){
        $sql = "UPDATE tbl_sobre SET texto_1='".$textSobre."' WHERE id_sobre =".$_SESSION['id_sobre'];
    }
    mysqli_query($conexao, $sql);
    //echo($sql);
    header('location:admSobre.php');
}




// VERIFICANDO MODO
if(isset($_GET['modo'])){

    $modo = $_GET['modo'];
    // Se for excluir
    if($modo == 'excluir'){
        
        $id = $_GET['id_sobre'];

        $sql = "DELETE FROM tbl_sobre WHERE id_sobre=".$id;

        mysqli_query($conexao, $sql);
        header('location:admSobre.php');

       // Se for editar
    }
        
    else if($modo == 'editar'){
       
        $botao = "editar";
        $id = $_GET['id_sobre'];
        $_SESSION['id_sobre']=$id;
        // echo($id);

        $sql = "SELECT * FROM tbl_sobre WHERE id_sobre=".$id;

        $select = mysqli_query($conexao, $sql);


       

        if($rsConsulta=mysqli_fetch_array($select)){
            //a variavel recebe os dados da tabela
            $textoSobre = $rsConsulta['texto_1'];
        }
    
    }else if($modo = 'status'){
        //criando a variavel status para receber o valor de status quando for clicada
        $valorStatus = $_GET['valorStatus'];
        $id = $_GET['id_sobre'];

        if($valorStatus == 0){
            $valorStatus = 1;
        }else{
            $valorStatus = 0;
        }
        $sql = "UPDATE tbl_sobre SET status ='".$valorStatus."' WHERE id_sobre =".$id;

         mysqli_query($conexao, $sql);
        //echo($sql);
        header('location:admSobre.php');

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
    <div id="sessaoAdmSobre">
        <div id="seguraFormAdmSobre">
            <form method="POST" action="admSobre.php">
                <div id="tituloFormSobre">
                    <h2>Cadastro - Sobre a Livraria</h2>
                </div>
                
                <div class="itemFormCadSobre" >
                    <p>Texto:</p> <textarea name="txtAreaSobre" id="txtAreaSobre"><?php echo($textoSobre)?></textarea>
                </div>
                <div class="itemFormCadSobre"  style="height:50px;">
                    <input type="submit" value="<?php echo($botao)?>" name="btnGravarSobre" id="btnGravarSobre">
                </div>
            </form>
        </div>

        <!-- LISTA QUE SERA CARREGADA*************** -->
        <div id="listaCadSobre">
            
            <div class="itemListaCadSobre">
                Texto
            </div>
            <div class="itemListaCadSobre">
                Opções     
            </div>    
            <!-- LISTA SERA CARRREGADA A PARTIR DAQUI -->
            <?php


            
            $sql = "SELECT * FROM tbl_sobre order by id_sobre DESC";
            $select = mysqli_query($conexao,$sql);
           
            while($rsSobre = mysqli_fetch_array($select)){

            //criando verificação para mudar o status - ON/OFF
            if($rsSobre['status'] == 0){
                $imgStatus = "statusOff.png";
            }else{
                $imgStatus = "statusOn.png";
            }
                                   
            ?>
                       
            <div class="carregarListaCadSobre">
                <?php echo($rsSobre['texto_1'])?>
            </div>
            
            <div class="carregarListaCadSobre">
                <a href="admSobre.php?modo=status&valorStatus=<?php echo($rsSobre['status'])?>&id_sobre=<?php echo($rsSobre['id_sobre'])?>">
                    <img src="icons/<?php echo($imgStatus)?>" alt="status">
                </a>
                <a href="admSobre.php?modo=editar&id_sobre=<?php echo($rsSobre['id_sobre'])?>">
                    <img src="icons/edit.png.png" alt="editar">
                </a>
                <a href="admSobre.php?modo=excluir&id_sobre=<?php echo($rsSobre['id_sobre'])?>">
                    <img src="icons/delete.png" alt="excluir">
                </a>
            </div>
            <?php } ?>


        </div>



    </div>
</body>

<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>