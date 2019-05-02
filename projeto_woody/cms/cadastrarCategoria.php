<?php
        
    session_start();
    require_once('conexao.php');
    $conexao = conexaoBD();

    $botao = "inserir";
    $nome_categoria = "";

    if(isset($_POST['btnGravarCategoria'])){

        $nome_categoria = $_POST['txtNomeCategoria'];
        
        if($_POST['btnGravarCategoria'] == 'inserir'){

            $sql = "INSERT INTO tbl_categoria (nome_categoria) VALUES ('".$nome_categoria."');";
        
        }else if ($_POST['btnGravarCategoria'] == "editar"){
            
            $sql = "UPDATE tbl_categoria SET nome_categoria='".$nome_categoria."' WHERE id_categoria =".$_SESSION['id_categoria']; 
            
        }
        mysqli_query($conexao, $sql);
        //echo($sql);
        header("location:cadastrarCategoria.php");

    }

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        //se o modo for excluir
        if($modo == 'excluir'){
            $id_categoria = $_GET['id_categoria'];
            //deletar
            $sql = "DELETE FROM tbl_categoria WHERE id_categoria =".$id_categoria;

            //executando o scipt no banco
            mysqli_query($conexao, $sql);
            header('location: cadastrarCategoria.php');
        // se modo for buscar, editar
        }else if($modo == 'editar'){
            $botao = "editar";
            $id_categoria = $_GET['id_categoria'];

            $_SESSION['id_categoria']=$id_categoria;
            // fazendo a busca no banco
            $sql = "SELECT * FROM tbl_categoria WHERE id_categoria =".$id_categoria;
            //echo($sql);

            $select = mysqli_query($conexao, $sql);
            //echo($select);

            if($rs_categoria = mysqli_fetch_array($select)){

                $nome_categoria = $rs_categoria['nome_categoria'];


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

<!-- ************************************CADASTRAR CATEGORIA********************* -->
<div id="sessaoCadastroCat">

    <div id="seguraFormCadCat">
        <form method="POST" action="cadastrarCategoria.php" name="frmCategoria" style="width: 600px; height: 150px; margin-top: 5px">
            <div id="tituloFormCat">
                <h3>CADASTRO DE CATEGORIA</h3>
            </div>
            <div id="itemFormCadLivro">
                <p>Nome da Categoria: <input type="text" name="txtNomeCategoria" id="txtFormCategoria" value="<?php echo($nome_categoria)?>"></p>
            </div>
            <div id="itemFormCadLivro">
                <input type="submit" value="<?php echo($botao)?>" name="btnGravarCategoria" id="btnGravarCategoria">
            </div>
        </div>
         <!-- *************************LISTA QUE SERA CARREGADA******** -->
        <div id="listaCategoria">
            <div class="itemListaCategoria">
                Nome da Categoria
            </div>
            <div class="itemListaCategoria">
                Opções
            </div>
            <?php
        
                $sql = "SELECT * FROM tbl_categoria";
                $select = mysqli_query($conexao, $sql);
                
                while($rs_categoria = mysqli_fetch_array($select)){
                   
            ?>  
            
            <div class="carregarListaCategoria">
                <?php echo($rs_categoria['nome_categoria']);?>
            </div>
            <div class="carregarListaCategoria">
                <a href="cadastrarCategoria.php?modo=editar&id_categoria=<?php echo($rs_categoria['id_categoria'])?>">
                    <img src="icons/edit.png.png" alt="editar"> 
                </a>
                <a href="cadastrarCategoria.php?modo=excluir&id_categoria=<?php echo($rs_categoria['id_categoria'])?>">
                    <img src="icons/delete.png" alt="delete">    
                </a>
            
               
            </div>
            <?php
            
                }
            
            ?>
        </div>

    </div>
</div>


<!-- ***********************************FOOTER********************************* -->
<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>