<?php

    require_once('conexao.php');
    $conexao = conexaoBD();
        
    session_start();

    $botao = "inserir";
    $nome_subcategoria = "";
    $id_categoria = 3;
    

    if(isset($_POST['btnSalvar'])){

        $nome_subcategoria = $_POST['txtNomeSub'];  
        $id_categoria = $_POST['slccategoria'];

        if($_POST['btnSalvar'] == 'inserir'){

            $sql = "INSERT INTO tbl_subcategoria (nome_subcategoria, id_categoria) VALUES ('".$nome_subcategoria."','.$id_categoria.');";
            
            echo($sql);


        }else if ($_POST['btnSalvar']){

            $sql = "UPDATE tbl_subcategoria SET nome_subcategoria='".$nome_subcategoria."',id_categoria='.$id_categoria.' WHERE id_subcategoria =".$_SESSION['id_subcategoria'];
           
        }
        mysqli_query($conexao, $sql);
        //echo($sql);
        header("location: cadastrarSubcategoria.php");
    
    }

    if(isset($_GET['modo'])){
       $modo = $_GET['modo'];
        //se o modo for excluir 
        if($modo == 'excluir'){
            $id_subcategoria = $_GET['id_subcategoria'];
            //deleter
            $sql = "DELETE FROM tbl_subcategoria WHERE id_subcategoria =".$id_subcategoria;

            mysqli_query($conexao, $sql);
            header('location: cadastrarSubcategoria.php');
            
        }else if($modo == 'editar'){
            $botao = "editar";
            $id_subcategoria = $_GET['id_subcategoria'];
        
            $_SESSION['id_subcategoria']=$id_subcategoria;
        
            $sql = "SELECT tbl_categoria.nome_categoria, tbl_subcategoria.* 
            FROM tbl_subcategoria, tbl_categoria
            WHERE tbl_categoria.id_categoria = tbl_subcategoria.id_categoria
            AND id_subcategoria =".$id_subcategoria;
        
            $select = mysqli_query($conexao, $sql);
        
                if($rs_subcategoria = mysqli_fetch_array($select)){
                    $nome_categoria = $rs_subcategoria['nome_categoria'];
                    $nome_subcategoria = $rs_subcategoria['nome_subcategoria'];
                }
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

<!-- ***********************************CADASTRAR SUBCATEGORIA************************************* -->

<div id="sessaoCadastroSub">
    <div id="seguraFormCadSub">
        <form method="POST" action="cadastrarSubcategoria.php" name="frmCadSub" style="width: 600px; height: 150px; margin-top: 5px">
            <div id="tituloFormCadSub">
                <h3>CADASTRO DE SUBCATEGORIA</h3>
            </div>
            <div class="itemFormCadSub">
                <p>Categoria:
                <select name="slccategoria">
                 <!-- SELECT PARA PEGAR DADOS DO BANCO E CARREGAR O COMBO -->
                <?php
                    if($modo == "editar"){
                ?>      <option value="<?php echo($id_categoria)?>"><?php echo($nome_categoria)?></option>
                <?php
                    }else{
                ?>
                        <option>Selecione a categoria:</option>
                <?php 
                    }
                            
                    $sql = "SELECT * FROM tbl_categoria WHERE tbl_categoria.id_categoria <>".$id_categoria;
                    $select = mysqli_query($conexao, $sql);

                    while($rs_categoria = mysqli_fetch_array($select)){
                ?>
                                
                    <option value="<?php echo($rs_categoria['id_categoria'])?>"><?php echo($rs_categoria['nome_categoria']);?></option>
                <?php
                    }
                ?>

                </select>
                </p>
            </div>
            <div class="itemFormCadSub">
                <p>Subcategoria: <input type="text" name="txtNomeSub" value="<?php echo($nome_subcategoria)?>" id="txtFormSub"></p>
            </div>
            <div class="itemFormCadSub">
                <input type="submit" value="<?php echo($botao)?>" name="btnSalvar" id="btnSalvar">
            </div>
           

        </form>
    </div>

<!-- *********************************** CARREGAR LISTA ************************************* -->
    <div id="listaSubcategoria">
        <div class="itemListaSubcategoria">
            Categoria
        </div>
        <div class="itemListaSubcategoria">
            SubCategoria
        </div>
        <div class="itemListaSubcategoria">
            Opções
        </div>
        <?php
         
         $sql = "SELECT tbl_categoria.nome_categoria, tbl_subcategoria.* FROM tbl_categoria,tbl_subcategoria WHERE tbl_subcategoria.id_categoria = tbl_categoria.id_categoria";
         $select = mysqli_query($conexao, $sql);

         while($rs_subcategoria = mysqli_fetch_array($select)){
   
        ?>
        <div class="carregarListaSubcategoria">
            <?php echo($rs_subcategoria['nome_categoria']);?>
        </div>

        <div class="carregarListaSubcategoria">
            <?php echo($rs_subcategoria['nome_subcategoria']);?>
        </div>
        <div class="carregarListaSubcategoria">
            <a href="cadastrarSubcategoria.php?modo=editar&id_subcategoria=<?php echo($rs_subcategoria['id_subcategoria'])?>">
                <img src="icons/edit.png.png" alt="editar"> 
            </a>
            <a href="cadastrarSubcategoria.php?modo=excluir&id_subcategoria=<?php echo($rs_subcategoria['id_subcategoria'])?>">
                <img src="icons/delete.png" alt="delete">    
            </a>
        </div>
        <?php
        
            }
        
        ?>
    </div>
</div>














<!-- ***********************************FOOTER********************************* -->
<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>