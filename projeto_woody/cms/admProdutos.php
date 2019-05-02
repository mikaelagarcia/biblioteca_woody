<?php
        
    session_start();
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
    <!-- ************************* ADM PRODUTOS ********************** -->        
    <div id="admProdutos">
        <div class="itemOpcao">
            <img src="icons/adm.png" alt="img_config"> 
            <a href="cadastrarCategoria.php">
                <input type="button" value="Cadastrar Categoria" class="btnAdmProdutos"> 
            </a>
        </div>

        <div class="itemOpcao">
            <img src="icons/adm.png" alt="img_config"> 
            <a href="cadastrarSubcategoria.php">
                <input type="button" value="Cadastrar Subcategoria" class="btnAdmProdutos"> 
            </a>
        </div>

        <div class="itemOpcao">
            <img src="icons/adm.png" alt="img_config"> 
            <a href="cadastrarLivro.php">
                <input type="button" value="Cadastrar Livro" class="btnAdmProdutos"> 
            </a>
        </div>

       




            
    </div>
    

</body>
              
<!-- ***********************************FOOTER********************************* -->
<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>