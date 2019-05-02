<?php

require_once('conexao.php');
$conexao = conexaoBD();

session_start();

    $nivel = "";
    $botao = "inserir";


    

    //pegando informação do botão via post
if(isset($_POST['salvar'])){

    $nomeNivel = $_POST['cadNivel'];

    //enviado a informação de que vai inserir - vai haver a opção de que vai editar
    if($_POST['salvar'] == 'inserir'){

        $sql = "INSERT INTO tbl_niveis (nivel) VALUES ('".$nomeNivel."');";
    
    }else if($_POST['salvar'] == "editar"){
    
        $sql = "UPDATE tbl_niveis SET nivel='".$nomeNivel."' WHERE id_nivel =".$_SESSION['id_nivel']; 
    } 
         
    mysqli_query($conexao, $sql);
     //echo($sql);
    header("location:cadastroNivel.php");
}
    
    
    if(isset($_GET['modo'])){

        $modo = $_GET['modo'];
        //se o modo for excluir
        if($modo == 'excluir'){
            $codigo = $_GET['id_nivel'];
            //deletar
            $sql = "DELETE FROM tbl_niveis WHERE id_nivel =".$codigo;
            //executando o script no banco
            mysqli_query($conexao, $sql);
            header('location:cadastroNivel.php');

        //se o modo for buscar, edita o dado
         }else if($modo == 'editar'){

            $botao = "editar";
            $codigo = $_GET['id_nivel'];
            //criando variavel de sessao para guardar o id do registro que será editado
            $_SESSION['id_nivel']=$codigo;
            //fazendo a busca no banco
            $sql = "SELECT * from tbl_niveis WHERE id_nivel =".$codigo;
            //echo($sql);
            $select = mysqli_query($conexao, $sql);
            //echo($select);
            if($rsConsulta = mysqli_fetch_array($select)){
                $nivel = $rsConsulta['nivel'];
            }
        //verificando se a variavel modo é igual a status
         }else if($modo == "status"){
            //criando a variavel para verificar o que o status esta mostrando na URL
            $valorStatus = $_GET['valorStatus'];
            $codigo = $_GET['id_nivel'];
            //criando condição  para verificar status, se 0 ou 1 e atribundo a variavel
            if($valorStatus == 0){
                $valorStatus = 1;
            }else{
                $valorStatus = 0;
            }
            //fazendo o update do status 
            $sql = "UPDATE tbl_niveis SET status ='".$valorStatus."' WHERE id_nivel =".$codigo;

            mysqli_query($conexao, $sql);
            header('location:cadastroNivel.php');
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
    <!-- *************************ADM NIVEL********************** -->        
    <div id="sessaoForm">
        <div id="seguraForm">
            <form method="POST" action="cadastroNivel.php" >
                <div class="cadNivel"> 
                    <h4>Nome do Nivel:</h4> 
                    <input type="text" name="cadNivel" id="txtcadNivel" value="<?php echo($nivel)?>">
                </div>    
                <input type="submit" value="<?php echo($botao)?>" name="salvar" id="btnSalvarNivel">
            </form> 
        </div>    
    <!-- **********************INICIO DA LISTA**********************  -->
        <div id="listaNivel">
            <div class="itemListaNivel">
                <h4>Nome do Nivel</h4>
            </div> 

            <div class="itemListaNivel">
                <h4>Opções</h4>
            </div>    
            <!-- *************DIV QUE SERA CARREGADA********* -->
            
            <?php
                $sql = "SELECT * FROM tbl_niveis ORDER BY id_nivel DESC";
                $select = mysqli_query($conexao,$sql);
                while($rsNivel = mysqli_fetch_array($select)){
                //criando condição para verificar se o status esta ON ou OFF 
                if($rsNivel['status'] == 0){
                    $imgStatus = "statusOff.png";
                }else{
                    $imgStatus = "statusOn.png";
                }
            ?>
                        
            <div class="carregarCadNivel">
                <p><?php echo($rsNivel['nivel']);?></p>
            </div>
            <div class="carregarCadNivel">
                
                <a href="cadastroNivel.php?modo=status&valorStatus=<?php echo($rsNivel['status'])?>&id_nivel=<?php echo($rsNivel['id_nivel'])?>">
                    <!-- Mostrando a variavel criada para mostrar a alteração do status -->
                    <img src="icons/<?php echo($imgStatus)?>" alt="status">
                </a>
                <a href="cadastroNivel.php?modo=editar&id_nivel=<?php echo($rsNivel['id_nivel'])?>">
                    <img src="icons/edit.png.png" alt="editar">
                </a>
                <a href="cadastroNivel.php?modo=excluir&id_nivel=<?php echo($rsNivel['id_nivel'])?>">
                    <img src="icons/delete.png" alt="delete">
                </a>
            </div>    
            <?php 
            }
            ?>
        </div>    
</body>
              
<!-- ***********************************FOOTER********************************* -->
<footer>
    <?php 
        require_once("footer.php");
    ?>
</footer>    
</html>